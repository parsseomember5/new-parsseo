<div id="contact-popup" class="lity-hide custom-popup">
    <div class="custom-popup-content">
        <div class="contact-form">
            @include('front.includes.alerts',['class' => 'mb-3'])
            <form action="{{route('contact_form')}}" method="post">
                @csrf
                <div class="form-title">{{$generalSetting->popup_title}}</div>
                <div class="form-description">{{$generalSetting->popup_description}}</div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-field mb-25">
                            <label for="name">نام</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-field mb-25">
                            <label for="phone-number">شماره تماس</label>
                            <input type="text" name="phone" id="phone-number" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-field mb-30">
                            <label for="message">توضیحات (اختیاری)</label>
                            <textarea id="message" name="message" placeholder="سلام ..."></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-field">
                            <button class="main-btn" type="submit">ثبت درخواست <i class="far fa-arrow-left"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <img src="{{$generalSetting->getPopupImage()}}" alt="{{$generalSetting->popup_title}}" class="custom-popup-image">
</div>
