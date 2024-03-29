<div>
    <div class="flex flex-wrap">
        @foreach($annonces as $key => $annonce)
            @if($key % 5 == 0 && $key != 0)
    </div>

    <div class="flex flex-wrap">
        @endif

        <div class="w-full md:w-1/5 p-6 flex flex-col">
            <a href="{{ url("annonce=". $annonce->id) }}" class="w-64 h-64">
                @if ($annonce->images->isNotEmpty())
                    <img class="hover:grow hover:shadow-lg h-full w-full object-cover" src="{{ $annonce->images->first()->url_image }}" alt="Image de l'annonce">
                @else
                    <img class="hover:grow hover:shadow-lg h-full w-full object-cover" src="Pas_d'image_disponible.svg.png" alt="Pas d'image disponible">
                @endif
            </a>



        <div class="pt-3 flex items-center justify-between favoris-toggle">
                <div>
                    <form wire:submit.prevent="toggleFavori({{ $annonce->id }})">
                        @csrf
                        @if ($annonce->isFavoritedByUser(Auth::id()))
                            <button type="submit">
                                <svg class="toggle-svg h-6 w-6 fill-current text-red-500 hover:text-black">
                                    <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,
                                            8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415
                                            c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205
                                            c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,
                                            2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                </svg>
                            </button>
                        @else
                            <button type="submit">
                                <svg class="toggle-svg h-6 w-6 fill-current text-gray-500 hover:text-black">
                                    <path d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,
                                            8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415
                                            c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205
                                            c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,
                                            2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
                                </svg>
                            </button>
                        @endif
                    </form>
                </div>
            </div>
            <div class="pt-3 flex items-center justify-between">
                <p class="">{{ $annonce->titre }}</p>
            </div>
            <p class="pt-1 text-gray-900">{{ $annonce->prix }} FCFA</p>
            <p>Publié Par : {{ $annonce->user->name }}</p>
            <p>{{ $annonce->created_at->format('d/m/Y') }}</p>
        </div>
        @endforeach
        @if(session('message'))
            <div class="alert {{ session('alert-class') }}">
                {{ session('message') }}
            </div>
        @endif

    </div>
</div>
