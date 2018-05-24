<div class="left_nav">
    <ul>
        @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        @else
        <li><a href="#">Profile</a></li>
        @endguest
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>
    <div class="clear"></div>
</div>
