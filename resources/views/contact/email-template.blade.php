<div class="container">
    <div class="card">
        <div class="card-body">
            @if (session('resent')){
                <h5>
                    E-mail sent Successfully
                </h5>
            }
            @endif
            <p>Name: <br> <span>{!! $name !!}</span></p>
            <p>Email: <br> <span>{!! $email !!}</span></p>
            <p>Phone: <br> <span>{!! $phone !!}</span></p>
            <p>Subject: <br> <span>{!! $subject !!}</span></p>
            <p>Message: <br> <span>{!! $content !!}</span></p>
        </div>
    </div>
</div>
