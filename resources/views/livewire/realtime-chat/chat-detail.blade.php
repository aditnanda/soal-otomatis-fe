<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <style>
        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        .footers {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: white;
        }

        .headers {
            width: 100%;
        }

        .buttons {
            padding: 0;
            border: none;
            background: none;
        }

        .content {
            padding-top: 50px;
        }

        .rating {
            float: left;
            margin-bottom: 16px;
        }

        /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
   follow these rules. Every browser that supports :checked also supports :not(), so
   it doesn’t make the test unnecessarily selective */
        .rating:not(:checked)>input {
            position: absolute;
            top: -9999px;
            clip: rect(0, 0, 0, 0);
        }

        .rating:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 200%;
            line-height: 1.2;
            color: #ddd;
        }

        .rating:not(:checked)>label:before {
            content: '★ ';
        }

        .rating>input:checked~label {
            color: #f70;
        }

        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: gold;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked+label:hover~label,
        .rating>input:checked~label:hover,
        .rating>input:checked~label:hover~label,
        .rating>label:hover~input:checked~label {
            color: #ea0;
        }

        .rating>label:active {
            position: relative;
            top: 2px;
            left: 2px;
        }

        /* end of Lea's code */

        /*
 * Clearfix from html5 boilerplate
 */

        .clearfix:before,
        .clearfix:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }

        .clearfix:after {
            clear: both;
        }

        /*
 * For IE 6/7 only
 * Include this rule to trigger hasLayout and contain floats.
 */

        .clearfix {
            *zoom: 1;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    @if ($welcome)
        {{-- <div id="main"> --}}
        <section id="content-types">
            <div class="row">
                <div class=" col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body" style="background-color: #5F338B; color: white;">
                                <h1 class="">{{$title}}</h1>
                                <p class="card-text">
                                    {{$desc}}
                                </p>
                            </div>
                            <img class="img-fluid w-100"
                                src="{{$banner}}"
                                alt="{{$title}}">
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span>Mulai Percakapan</span>
                            <button class="btn btn-success" onclick="goSend()">Kirimi Kami Pesan</button>
                        </div>
                    </div>

                    <div class="card collapse-icon accordion-icon-rotate">
                        <div class="card-header" style="background-color: #5F338B; color: white">
                            <h1 class="card-title pl-1">(FAQ) Frequently Asked Questions</h1>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="accordion" id="cardAccordion">
                                    @foreach ($faqs as $key => $item)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $key }}"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
                                                aria-expanded="false" aria-controls="collapse{{ $key }}"
                                                role="button">
                                                <span class="collapsed collapse-title">{{ @$item['pertanyaan'] }}</span>
                                            </div>
                                            <div id="collapse{{ $key }}" class="collapse pt-1"
                                                aria-labelledby="heading{{ $key }}"
                                                data-parent="#cardAccordion">
                                                <div class="card-body">
                                                    {{ @$item['jawaban'] }}
                                                    <br><br>
                                                    @if (\Session::get('faq'.$item['id'].':'.$room_chat_id))
                                                    <p style="font-size: 12px;margin: 0px; color: #5F338B">Terima kasih atas tanggapan Anda!</p>
                                                    @else
                                                    <p style="font-size: 12px;margin: 0px; color: #5F338B">Apakah
                                                        Jawaban ini Membantu?</p>
                                                    <button type="button" class="green buttons"
                                                        wire:click="faq_ans('{{ $item['id'] }}','Membantu')">

                                                        <p style="font-size: 12px;margin: 0px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z" />
                                                            </svg>
                                                            Ya
                                                        </p>

                                                    </button>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="green buttons"
                                                        wire:click="faq_ans('{{ $item['id'] }}','Tidak Membantu')">

                                                        <p style="font-size: 12px;margin: 0px;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-hand-thumbs-down" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8.864 15.674c-.956.24-1.843-.484-1.908-1.42-.072-1.05-.23-2.015-.428-2.59-.125-.36-.479-1.012-1.04-1.638-.557-.624-1.282-1.179-2.131-1.41C2.685 8.432 2 7.85 2 7V3c0-.845.682-1.464 1.448-1.546 1.07-.113 1.564-.415 2.068-.723l.048-.029c.272-.166.578-.349.97-.484C6.931.08 7.395 0 8 0h3.5c.937 0 1.599.478 1.934 1.064.164.287.254.607.254.913 0 .152-.023.312-.077.464.201.262.38.577.488.9.11.33.172.762.004 1.15.069.13.12.268.159.403.077.27.113.567.113.856 0 .289-.036.586-.113.856-.035.12-.08.244-.138.363.394.571.418 1.2.234 1.733-.206.592-.682 1.1-1.2 1.272-.847.283-1.803.276-2.516.211a9.877 9.877 0 0 1-.443-.05 9.364 9.364 0 0 1-.062 4.51c-.138.508-.55.848-1.012.964l-.261.065zM11.5 1H8c-.51 0-.863.068-1.14.163-.281.097-.506.229-.776.393l-.04.025c-.555.338-1.198.73-2.49.868-.333.035-.554.29-.554.55V7c0 .255.226.543.62.65 1.095.3 1.977.997 2.614 1.709.635.71 1.064 1.475 1.238 1.977.243.7.407 1.768.482 2.85.025.362.36.595.667.518l.262-.065c.16-.04.258-.144.288-.255a8.34 8.34 0 0 0-.145-4.726.5.5 0 0 1 .595-.643h.003l.014.004.058.013a8.912 8.912 0 0 0 1.036.157c.663.06 1.457.054 2.11-.163.175-.059.45-.301.57-.651.107-.308.087-.67-.266-1.021L12.793 7l.353-.354c.043-.042.105-.14.154-.315.048-.167.075-.37.075-.581 0-.211-.027-.414-.075-.581-.05-.174-.111-.273-.154-.315l-.353-.354.353-.354c.047-.047.109-.176.005-.488a2.224 2.224 0 0 0-.505-.804l-.353-.354.353-.354c.006-.005.041-.05.041-.17a.866.866 0 0 0-.121-.415C12.4 1.272 12.063 1 11.5 1z" />
                                                            </svg>
                                                            Tidak
                                                        </p>

                                                    </button>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        {{-- </div> --}}
        <!-- Basic Card types section end -->
    @else
        <section class="section" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background-color: #5F338B; position: fixed; width: 100%;"
                            id="myHeader" wire:ignore>
                            <div class="media d-flex align-items-center">
                                {{-- <div class="avatar me-3">
                    <img src="assets/images/faces/1.jpg" alt="" srcset="">
                    <span class="avatar-status bg-success"></span>
                  </div> --}}
                                <div class="name flex-grow-1 headers" id="myHeader2">
                                    <h6 class="mb-2" style="color: white; margin-top:4px; margin-bottom:4px;">PANGANHUB
                                        </h6>


                                    {{-- <span class="text-xs">Online</span> --}}
                                </div>
                                <button class="btn btn-sm">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> --}}
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-4 bg-grey" style="padding-bottom: 140px;">
                            <div class="chat-content content" id="content" wire:ignore>
                                @foreach ($chats as $item)
                                    @if ($jwt['id'] == $item['user_id'])
                                        <div class="chat">
                                            <div class="chat-body">
                                                <div class="chat-message">
                                                    <p style="text-align: right; font-size: 14px;margin-bottom:0px;">
                                                        <b>{{ $item['name'] }}</b>
                                                    </p>
                                                    @if (@$item['file'])
                                                        <div
                                                            style="text-align: right; font-size: 14px;margin-bottom:2px; margin-top:2px;">
                                                            <a href="{{ $base_url . $item['file'] }}"
                                                                target="__blank"><img
                                                                    src="{{ $base_url . $item['file'] }}"
                                                                    class="img-fluid" alt="" srcset=""
                                                                    width="200px" max-width="90%"></a>
                                                            <br>
                                                        </div>
                                                    @endif
                                                    <p style="text-align: right;margin:0px;">{!! $item['message'] !!}</p>
                                                    <p style="text-align: right; font-size: 11px;margin-bottom:0px;"
                                                        id="chatread{{ $item['id'] }}">
                                                        @if (@$item['is_read'])
                                                            dibaca -
                                                        @endif
                                                        {{ date('Y-m-d H:i', strtotime($item['created_at'])) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="chat chat-left">
                                            <div class="chat-body">
                                                <div class="chat-message" style="background: #5F338B!important">
                                                    <p style="text-align: left; font-size: 14px;margin-bottom:0px;">
                                                        <b>{{ $item['name'] }}</b>
                                                    </p>
                                                    @if (@$item['file'])
                                                        <div
                                                            style="text-align: left; font-size: 14px;margin-bottom:2px; margin-top:2px;">
                                                            <a href="{{ $base_url . $item['file'] }}"
                                                                target="__blank"><img
                                                                    src="{{ $base_url . $item['file'] }}"
                                                                    class="img-fluid" alt="" srcset=""
                                                                    width="200px" max-width="90%"></a>
                                                            <br>
                                                        </div>
                                                    @endif
                                                    <p style="text-align: left;margin:0px;">{!! $item['message'] !!}</p>
                                                    <p style="text-align: left; font-size: 11px;margin-bottom:0px;">
                                                        {{ date('Y-m-d H:i', strtotime($item['created_at'])) }}</p>
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                @endforeach




                            </div>
                        </div>
                        <div class="card-footer footers">
                            <div class="message-form d-flex flex-direction-column align-items-center">
                                <button type="button" class="black buttons" wire:click="showImage()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                                        <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        <path
                                            d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z" />
                                    </svg>
                                </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                <div class="d-flex flex-grow-1 ml-4" onclick="sectionchat()">
                                    <textarea type="text" class="form-control"
                                        placeholder="{{ $status_room ? 'Ketikkan sesuatu..' : 'Room chat telah ditutup..' }}"
                                        wire:model="message" onkeydown="saveChat(this)" rows="3"
                                        id="inputchat" {{ $status_room ? '' : 'readonly' }} ></textarea>
                                </div>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" class="black buttons" wire:click="saveChat()"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                        <path
                                            d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                    </svg></button>&nbsp;

                            </div>
                            <br>
                            @if ($room_chat[0]['rating'])
                                <div class="row" wire:ignore>
                                <fieldset class="rating" style="margin-bottom: 0px;">
                                    <input type="radio" id="star5" name="rating" {{($room_chat[0]['rating'] == 5) ? 'checked' : ''}}
                                        value="5" /><label for="star5" title="Rocks!">5
                                        stars</label>
                                    <input type="radio" id="star4" name="rating" {{($room_chat[0]['rating'] == 4) ? 'checked' : ''}}
                                        value="4" /><label for="star4" title="Pretty good">4
                                        stars</label>
                                    <input type="radio" id="star3" name="rating" {{($room_chat[0]['rating'] == 3) ? 'checked' : ''}}
                                        value="3" /><label for="star3" title="Meh">3
                                        stars</label>
                                    <input type="radio" id="star2" name="rating" {{($room_chat[0]['rating'] == 2) ? 'checked' : ''}}
                                        value="2" /><label for="star2" title="Kinda bad">2
                                        stars</label>
                                    <input type="radio" id="star1" name="rating" {{($room_chat[0]['rating'] == 1) ? 'checked' : ''}}
                                        value="1" /><label for="star1" title="Sucks big time">1
                                        star</label>
                                </fieldset>
                                </div>
                            @else
                                @if ($room_chat[0]['status'])
                                    {{-- <button type="button" class="btn btn-success btn-sm" style="text-align: right;background: #5F338B"
                                        onclick="tutupChat('{{ $room_chat[0]['id'] }}')">Akhiri Chat Ini</button> --}}
                                        <button type="button" class="btn btn-success btn-sm" style="background: #5F338B"
                                        wire:click="goSendTrue()">Lihat
                                        FAQ</button>
                                @else
                                    @if ($jwt['id'] == $room_chat[0]['user_id'])
                                        <div class="col" wire:ignore>
                                            {{-- <div class="col-md-3"> --}}
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="rating"
                                                    value="5" /><label for="star5" title="Rocks!">5
                                                    stars</label>
                                                <input type="radio" id="star4" name="rating"
                                                    value="4" /><label for="star4" title="Pretty good">4
                                                    stars</label>
                                                <input type="radio" id="star3" name="rating"
                                                    value="3" /><label for="star3" title="Meh">3
                                                    stars</label>
                                                <input type="radio" id="star2" name="rating"
                                                    value="2" /><label for="star2" title="Kinda bad">2
                                                    stars</label>
                                                <input type="radio" id="star1" name="rating"
                                                    value="1" /><label for="star1" title="Sucks big time">1
                                                    star</label>
                                            </fieldset>
                                            &nbsp;
                                            {{-- </div>
                                            <div class="col-md-2"> --}}
                                            <button class="btn btn-success btn-sm" style="text-align: right;background: #5F338B"
                                                type="button" onclick="submitrating()">Submit Rating</button>
                                            {{-- </div> --}}


                                        </div>
                                    @endif
                                @endif


                            @endif
                            @if ($room_chat[0]['status'] == 0)

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success btn-sm" style="background: #5F338B"
                                        wire:click="goSendTrue()">Lihat
                                        FAQ</button>
                                </div>
                                <div class="col-md-6">
                                    @if ($room_chat[0]['closed_id'])
                                        @php
                                            $closed = json_decode($room_chat[0]['closed_id']);

                                        @endphp
                                        <p style="text-align: right; font-size: 11px;">Room chat ini diakhiri oleh :
                                            {{ $closed->name }}</p>
                                    @endif
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>


                <div class="modal fade text-left w-100" id="full-scrn-image" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel20" aria-hidden="true" wire:ignore>
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full"
                        role="document">
                        <div class="modal-content">
                            {{-- <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel20">Pesan Gambar</h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div> --}}
                            <div class="modal-body">
                                @livewire('realtime-chat.chat-detail-gambar', ['token' => $token, 'room_chat_id' => $room_chat_id])
                            </div>
                            {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-sm-block d-none">Tutup</span>
                            </button>

                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

</div>
@push('scripts')
    <script>
        window.livewire.on('scrollToDown', info => {
            scrollToDown();

        })

        function scrollToDown() {
            $(document).ready(function() {
                $(document).scrollTop($(document).height());
            });
        }
    </script>


    @if ($welcome == 0)
        <script>
            scrollToDown();
        </script>
    @endif


    <script>
        // window.onscroll = function() {
        //     myFunction();
        // };

        // var header = document.getElementById("myHeader");
        // var sticky = header.offsetTop;

        // var header2 = document.getElementById("myHeader2");
        // var sticky2 = header2.offsetTop;

        // function myFunction() {
        //     if (window.pageYOffset > sticky) {
        //         header.classList.add("sticky");
        //     } else {
        //         header.classList.remove("sticky");
        //     }

        //     if (window.pageYOffset > sticky2) {
        //         header2.classList.add("headers");
        //     } else {
        //         header2.classList.remove("headers");
        //     }
        // }
    </script>
    <script>
        function saveChat(e) {
            // console.log(event.key)
            if (event.key === 'Enter' && !event.shiftKey) {
                @this.call('saveChat')
            }
        }

        window.livewire.on('scrollDown', info => {
            scrollToDown();
        })
    </script>

    <script>
        var user_id = '{{ $jwt['id'] }}';
        var room_id = '{{ $room_chat[0]['id'] }}';
        var base_url = '{{ $base_url }}';

        window.livewire.on('insertChat', info => {

            // ini untuk tambah elemen
            let str = '';
            if (info.user_id == user_id) {
                if (info.file) {
                    str =
                        `
            <div class="chat">
            <div class="chat-body">
                <div class="chat-message">
                <p style="text-align: right; font-size: 14px;margin-bottom:0px;"><b>${info.name}</b></p>

                <div style="text-align: right; font-size: 14px;margin-bottom:2px; margin-top:2px;">
                    <a href="${base_url+info.file}" target="__blank"><img src="${base_url+info.file}" class="img-fluid" alt="" srcset="" width="200px" max-width="90%"></a>
                    <br>
                </div>

                <p style="text-align: right;margin:0px;">${info.message}</p>
                <p style="text-align: right; font-size: 11px;margin-bottom:0px;" id="chatread${info.id}">${info.created_at}</p>
                </div>
            </div>
            </div>
            `;
                } else {
                    str =
                        `
            <div class="chat">
            <div class="chat-body">
                <div class="chat-message">
                <p style="text-align: right; font-size: 14px;margin-bottom:0px;"><b>${info.name}</b></p>


                <p style="text-align: right;margin:0px;">${info.message}</p>
                <p style="text-align: right; font-size: 11px;margin-bottom:0px;" id="chatread${info.id}">${info.created_at}</p>
                </div>
            </div>
            </div>
            `;
                }

            } else {
                if (info.file) {
                    str =
                        `
            <div class="chat chat-left">
            <div class="chat-body">
                <div class="chat-message">
                <p style="text-align: left; font-size: 14px;margin-bottom:0px;"><b>${info.name}</b></p>

                <div style="text-align: left; font-size: 14px;margin-bottom:2px; margin-top:2px;">
                    <a href="${base_url+info.file}" target="__blank"><img src="${base_url+info.file}" class="img-fluid" alt="" srcset="" width="200px" max-width="90%"></a>
                    <br>
                </div>

                <p style="text-align: left;margin:0px;">${info.message}</p>
                <p style="text-align: left; font-size: 11px;margin-bottom:0px;">${info.created_at}</p>
                </div>
            </div>
            </div>
            `;
                } else {
                    str =
                        `
            <div class="chat chat-left">
            <div class="chat-body">
                <div class="chat-message">
                <p style="text-align: left; font-size: 14px;margin-bottom:0px;"><b>${info.name}</b></p>


                <p style="text-align: left;margin:0px;">${info.message}</p>
                <p style="text-align: left; font-size: 11px;margin-bottom:0px;">${info.created_at}</p>
                </div>
            </div>
            </div>
            `;
                }
            }
            document.querySelector('#content').insertAdjacentHTML('beforeend', str);
            scrollToDown();
        })
    </script>
    <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
    <script>
        const socket = io('{{ env('SOCKET_URL_SERVER') }}', {
            transports: ['websocket', 'polling', 'flashsocket']
        });

        socket.on('new:room:' + room_id, (info) => {
            @this.call('insertChatFromSocket', info.chat)

        })

        socket.on('new:room:read:' + room_id, (info) => {
            @this.call('insertReadChatFromSocket', info.chat)

        })
    </script>

    <script>
        window.livewire.on('showImage', info => {
            $("#full-scrn-image").modal('show');
        })

        window.livewire.on('hideImage', info => {
            $("#full-scrn-image").modal('hide');
            scrollToDown();

        })

        function close(params) {
            @this.call('close', params);
        }
    </script>
    <script>
        function goSend(params) {
            @this.call('goSend')
        }

        window.livewire.on('insertReadChat', infos => {
            var info;
            for (let i = 0; i < infos.length; i++) {
                info = infos[i];
                try {
                    document.getElementById('chatread' + info.id).innerText = info.created_at
                } catch (error) {

                }
            }
        })

        $(document).ready(function() {
            window.onkeydown = function(e) {
                if (e.target.nodeName == 'INPUT') return;

                socketSendRead();

            };

        });

        function sectionchat() {
            socketSendRead();
        }

        function socketSendRead() {
            try {
                var toket = '{{ $token }}';
                var room_chat_id = '{{ $room_chat_id }}'

                socket.emit('new:room:read:click', {
                    toket: toket,
                    room_chat_id: room_chat_id
                })
            } catch (error) {

            }
        }
    </script>

    <script>

        function submitrating() {
            if ($(".rating :radio:checked").length == 0) {
                alert('Tidak ada rating yang dipilih')
                return false;
            } else {
                @this.set('rating', $('input:radio[name=rating]:checked').val())
                @this.call('rating')
            }
        }

    </script>

    <script>
        window.livewire.on('insertChatSocket', data => {
            socket.emit('new:chat:create', { data })
        })

        socket.on('new:room:reload:go:' + room_id, (info) => {
            location.reload();
        })

        function tutupChat(id){
            Swal.fire({
            title: 'Apakah Anda ingin menutup percakapan ini?',
                text: 'Tindakan ini tidak dapat dibatalkan!',

            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Iya',
            denyButtonText: `Tidak`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                @this.call('close',id)
            } else if (result.isDenied) {

            }
            })
        }
    </script>
@endpush
