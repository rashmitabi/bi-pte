    <span class="heading"> Notifications </span>
    <div class="notifications-main-wrap">
        <ul>
            @if(!empty($notifications))
                @foreach($notifications as $newNotify)
                    <li><a href="{{ route('superadmin-view-notifications', $newNotify->id) }}">{{ $newNotify->title }}<span>{{ $newNotify->created_at->diffForHumans() }}</span></a></li>
                @endforeach
            @endif
            <a href="{{ route('superadmin-notifications') }}"><li> View All<span></span></li></a>
        </ul>
    </div>
