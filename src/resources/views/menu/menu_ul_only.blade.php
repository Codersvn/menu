<ul>
    @foreach ($getMenus as $item)
    <li>
        <a href="{{ $item->link }}">{{ $item->label }}</a> {!! $item->renderSubmenu() !!}
    </li>
    @endforeach
</ul>
