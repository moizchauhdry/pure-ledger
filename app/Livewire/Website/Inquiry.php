<?php

namespace App\Livewire\Website;

use App\Models\Inquiry as ModelsInquiry;
use App\Models\User;
use App\Notifications\InquiryNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Inquiry extends Component
{
    public string $name;
    public string $email;
    public string $phone;
    public string $message;

    public function render()
    {
        return view('livewire.website.inquiry');
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone' => ['required', 'string', 'lowercase'],
            'message' => ['required', 'string'],
        ]);

        $inquiry = ModelsInquiry::create($validated);
        $this->clear();

        try {
            $inquiries = ModelsInquiry::where('id', $inquiry->id)->first();
            Notification::send($inquiries, new InquiryNotification($inquiry, 'client'));

            $users = User::get();
            Notification::send($users, new InquiryNotification($inquiry, 'admin'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function clear()
    {
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->message = "";
    }
}
