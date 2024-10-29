@php
    $links = [
        [
            'url' => route('comics.index'),
            'label' => 'Comics',
        ],
        [
            'url' => route('comics.create'),
            'label' => 'New Comic',
          
        ],
        // [
        //     'url' => route('comics.show', ['comic' => $comic->id]) ,
        //     'label' => 'Comic',
        // ],

      
    ];
@endphp

<header>
    <nav>
        <ul>
            @foreach ($links as $link)
                <li>
                    <a href="{{ $link['url'] }}">
                        {{ $link['label'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</header>
