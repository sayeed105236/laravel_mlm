<ul>
    @foreach($childs->sortBy('position') as $child)
        <li>
            <a href="#">
                <div class="avatar bg-light-info mr-2" style="margin-left:20px;">
                    <div class="avatar-content">
                        <i data-feather="user" class="avatar-icon"></i>
                    </div>
                </div>
                <br>
                <h5>{{ $child->user_name }}</h5>
            </a>

            @if(count($child->placements))
                @include('users.pages.manageChild',['childs' => $child->placements])
            @endif
        </li>
    @endforeach
</ul>
