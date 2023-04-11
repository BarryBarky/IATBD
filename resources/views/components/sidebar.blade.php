@php
    // define heading for sidebar
    $headings = [
        [
            "FA_icon" => "fa-solid fa-list",
            "label" => "Welkom",
            "link" => "/dashboard",
            "show" => true,
            "children" => [
                 [
                    "label" => "Bekijken",
                    "link" => "/dashboard",
                     "show" => true
                ]
                ]
        ],
        [
            "FA_icon" => "fa-solid fa-envelope",
            "label" => "Advertenties",
            "link" => "/dashboard/advertenties",
            "show" => true,
            "children" => [
                 [
                    "label" => "Bekijken",
                    "link" => "/dashboard/advertenties",
                    "show" => true
                ],
                 [
                    "label" => "Advertentie aanmaken",
                    "link" => "/dashboard/advertenties/aanmaken",
                     "show" => true
                    ]
                ]
        ],
        [
            "FA_icon" => "fa-solid fa-paw",
            "label" => "Eigen Huisdieren",
            "link" => "/dashboard/huisdieren",
            "show" => true,
            "children" => [
                 [
                    "label" => "Bekijken",
                    "link" => "/dashboard/huisdieren",
                     "show" => true
                ],
                [
                    "label" => "Huisdier aanmaken",
                    "link" => "/dashboard/huisdieren/aanmaken",
                     "show" => true
                    ]
                ]
        ],
        [
            "FA_icon" => "fa-solid fa-list-check",
            "label" => "Beheer",
            "link" => "/dashboard/beheer",
            "show" => \Illuminate\Support\Facades\Auth::user()->hasRoles(['administrator']),
            "children" => [
                 [
                    "label" => "Bekijken",
                    "link" => "/dashboard/beheer",
                     "show" => true
                    ]
             ]
        ],
        [
            "FA_icon" => "fa-solid fa-user",
            "label" => "Mijn profiel",
            "link" => "/dashboard/mijn-profiel",
            "show" => true,
            "children" => [
                     [
                    "label" => "Bekijken",
                    "link" => "/dashboard/mijn-profiel",
                     "show" => true
                    ],
                    [
                    "label" => "Als oppasser aanmelden",
                    "link" => "/dashboard/mijn-profiel/oppasser/aanmaken",
                    "show" => !\Illuminate\Support\Facades\Auth::user()->pet_sitter_id
]
                ]

        ]
    ];
@endphp
{{--{{dd(Storage::url(Auth::user()->profile_pic))}}--}}
<aside class="sidebar">
    <section>
        <section class="sidebar-nav">
            <figure style="width: 80%">
                <img src="{{asset('/images/logo.svg')}}" alt="logo" class="img-fluid">
            </figure>
            <ul class="sidebar-nav-list">
                @foreach($headings as $heading)
                    {{--                    {{dd(Str::substr($heading['link'], 1))}}--}}
                    @if($heading['show'])
                        <li>
                            <a href="{{$heading['link']}}">
                                <ul class="sidebar-nav-item">
                                    <li><i class="{{$heading['FA_icon']}}"></i></li>
                                    <li>{{$heading['label']}}</li>
                                </ul>
                                @if(isset($heading['children']))
                                    <ul class="sidebar-nav-sublist">
                                        @foreach($heading['children'] as $child)
                                            @if($child['show'])
                                            <li><a href="{{$child['link']}}"
                                                   class="{{Request::is(Str::substr($child['link'], 1)) ? 'active' : ''}}">{{$child['label']}}</a>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </section>
        <section class="sidebar-user">

            <ul class="sidebar-user-item">
                <li>
                    <ul>
                        <li id="user-names">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</li>
                        <li id="logout">
                            <a href="/uitloggen">Uitloggen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <figure>
                        <img
                            src="{{Auth::user()->profile_pic ? Storage::url(Auth::user()->profile_pic) : Storage::url('/profile_pics/users/placeholder.png')}}"
                            alt="Banner User" class="img-fluid">
                    </figure>
                </li>
            </ul>

        </section>
    </section>
</aside>

<aside class="sidebar-mobile" style="position: sticky; top: 0px">
    <section class="space-between">
        <figure style="max-width: 60%; margin: auto">
            <img src="{{asset('/images/logo.svg')}}" alt="logo" class="img-fluid">
        </figure>
    </section>
    <section class="column">
        <section class="column" style="justify-content: center">
            <section id="open-menu" class="row"
                     onclick="expandSidebar(this.childNodes[2], this.parentElement.parentElement.children[1])">
                <span>Menu</span><i class="fa-solid fa-chevron-right"></i>
            </section>
        </section>
        <section class="sidebar-mobile-nav sidebar-hidden">
            <ul class="sidebar-nav-list">
                @foreach($headings as $heading)
                    {{--                    {{dd(Str::substr($heading['link'], 1))}}--}}
                    <li>
                        <a href="{{$heading['link']}}">
                            <ul class="sidebar-nav-item">
                                <li><i class="{{$heading['FA_icon']}}"></i></li>
                                <li>{{$heading['label']}}</li>
                            </ul>
                            @if(isset($heading['children']))
                                <ul class="sidebar-nav-sublist">
                                    @foreach($heading['children'] as $child)

                                        <li><a href="{{$child['link']}}"
                                               class="{{Request::is(Str::substr($child['link'], 1)) ? 'active' : ''}}">{{$child['label']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
            <section class="sidebar-user">
                <ul class="sidebar-user-item">
                    <li>
                        <ul>
                            <li id="user-names">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</li>
                            <li id="logout">
                                <a href="/uitloggen">Uitloggen</a>
                            </li>
                        </ul>
                    </li>
                    @if(Auth::user()->profile_pic)
                        <li>
                            <figure>
                                <img src="{{Storage::url(Auth::user()->profile_pic)}}" alt="Banner User"
                                     class="img-fluid">
                            </figure>
                        </li>
                    @endif
                </ul>
            </section>
        </section>
    </section>


</aside>
