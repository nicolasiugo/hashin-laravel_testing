@layout('layouts/main')

@section('navigation')
@parent
<li><a href="about">About</a></li>
@endsection

@section('content')
<div class="hero-unit">
    <div class="row">
        <div class="span6">
            <h1>Welcome to Instapics!</h1>
            <p>Instapics is a fun way to share photos with family and friends.</p>
            <p>Wow them with your photo-filtering abilities!</p>
            <p>Let them see what a great photographer you are!</p>
            <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
            
            <form class="well" method="POST" action="user/authenticate">
                <label for="email">Email</label>
                <input type="text" placeholder="Your Email Address" name="email" id="email" />
                <label for="password">Password</label>
                <input type="password" placeholder="Your Password" name="password" id="password" />
                <label class="checkbox" for="new_user">
                    <input type="checkbox" name="new_user" id="new_user" checked="checked"> I am a new user
                </label>
                <br />
                <button type="submit" class="btn btn-success">Login or Register</button>
            </form>
        </div>
        
        <div class="span4">
            <img src="img/phones.png" alt="Instapics!" />
        </div>
    </div>
    
    
</div>
@endsection