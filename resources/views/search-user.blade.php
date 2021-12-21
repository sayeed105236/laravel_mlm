<style>
    .search-item-design{
        padding-top: 10px;
    }
   .design-li{
        list-style: none;
        padding: 0 20px;
    }
    .design-li:hover{
        background:#DA9F0D;
        cursor: pointer;
    }
    .design-li a:hover{
       color:white;
    }
</style>

<ul class="search-item-design">
    @forelse ($sponsor as $item)
    @empty
        <div style="color:white; padding:0 20px;">Not Found</div>
    @endforelse
</ul>
