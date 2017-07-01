<div class="col-md-5">
    <div class="usp-list --narrow">
        <div class="row">
            <div class="col-sm-12">
                <div class="place-title">@setting('core::site-name')</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="icon address">
                    {{ setting('contact::address_line_1') }} <br>
                    {{ setting('contact::address_line_2') }}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="icon phone"><a href="tel:{{ setting('contact::phone_callable') }}">{{ setting('contact::phone') }}</a></div>
                <div class="icon email"><a href="mailto:{{ setting('contact::email') }}">{{ setting('contact::email') }}</a></div>
            </div>
        </div>
    </div>
</div>
