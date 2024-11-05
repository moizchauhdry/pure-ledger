<div>
    <section id="consultation" class="ds page_contact background_cover section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="small-text2 grey">order</p>
                    <h2 class="section_header">A free consultation</h2>

                    <div class="with_background transp_black_bg with_padding topmargin_60">
                        <form class="contact-form row columns_margin_bottom_20" wire:submit="store">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="consultation-name">Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" aria-required="true" size="30" wire:model="name"
                                        id="consultation-name" class="form-control with_icon" placeholder="Full Name*">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span class="text-danger" style="float: left">{{$errors->first('name')}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="consultation-phone">Phone
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" aria-required="true" size="30" wire:model="phone"
                                        id="consultation-phone" class="form-control with_icon"
                                        placeholder="Phone Number*">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span class="text-danger" style="float: left">{{$errors->first('phone')}}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="consultation-email">Email
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" aria-required="true" size="30" wire:model="email"
                                        id="consultation-email" class="form-control with_icon"
                                        placeholder="Email Address*">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span class="text-danger" style="float: left">{{$errors->first('email')}}</span>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="consultation-message">Message</label>
                                    <textarea aria-required="true" rows="3" cols="45" wire:model="message"
                                        id="consultation-message" class="form-control with_icon"
                                        placeholder="Message*"></textarea>
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="text-danger" style="float: left">{{$errors->first('message')}}</span>
                                </div>
                            </div>

                            <div class="col-sm-12 bottommargin_0">
                                <div class="contact-form-submit">
                                    <button type="submit" id="consultation-submit" name="contact_submit"
                                        class="theme_button color1 wide_button">
                                        <span wire:loading.remove>Submit</span>
                                        <span wire:loading>Loading ... Please Wait.</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>