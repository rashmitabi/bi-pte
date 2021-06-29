    <span class="heading"> Notifications </span>
    <div class="notifications-main-wrap">
        <ul>
            @if(!empty($notifications))
                @foreach($notifications as $newNotify)
                <li>{{ $newNotify->title }}<span>{{ $newNotify->created_at->diffForHumans() }}</span></li>
                @endforeach
            @endif
            <li>View All<span></span></li>
        </ul>
    </div>
