<div class="comments" data-json-post="{{ $post }}">
    <h2>Комментарии</h2>
    @if (!empty(Auth::user()))
        <div class="comment_form">
            <form method="POST" action="{{ route('personal.comment.add', ['post' => $post->id]) }}">
                @csrf
                <div class="form__group">
                    <img class="img-circle img-bordered-sm" src="{{ asset(Auth::user()->getImage()) }}" alt="User Image">
                    <textarea required name="message" id="message" placeholder="Напишите комментарии"></textarea>
                </div>
                <div class="form__btn">
                    <button class="btn" type="submit">Отправить</button>
                    <button class="btn-reset" type="reset">Очистить поле</button>
                </div>

            </form>
        </div>
    @else
        <p class="coment_notauth">Что бы оставить комментарии, нужно <a href="{{ route('register.create') }}"
                target="_blank">зарегистрироваться</a> / <a href="{{ route('login.create') }}"
                target="_blank">авторизоваться</a> </p>
    @endif

    @if (isset($comments) && $comments->count() > 0)
        @foreach ($comments as $comment)
            <div class="comment clearfix" data-json="{{ $comments }}">
                <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset($comment->user->getImage()) }}" alt="User Image">
                    <span class="username">
                        {{ $comment->user->name }}
                        <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">{!! $comment->created_at->format('d.m.Y, H:i') !!}</span>
                </div>
                <p>
                    {!! $comment->message !!}
                </p>
                <p>
                    <a href="#" class="link-black text-sm">
                        @if ($comment->likes == null)
                            0
                        @else
                            {{ $comment->likes }}
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" id="heart">
                            <path fill="#f05542"
                                d="M5.301 3.002c-.889-.047-1.759.247-2.404.893-1.29 1.292-1.175 3.49.26 4.926l.515.515L8.332 14l4.659-4.664.515-.515c1.435-1.437 1.55-3.634.26-4.926-1.29-1.292-3.483-1.175-4.918.262l-.516.517-.517-.517C7.098 3.438 6.19 3.049 5.3 3.002z">
                            </path>
                        </svg>
                        Нравиться
                    </a>
                    @if (Auth::user()->is_admin)
                        <form action="{{ route('personal.comment.deleteComment', ['comment' => $comment->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn link-black text-sm">
                                Удалить
                            </button>
                        </form>
                    @endif

                </p>
            </div>
        @endforeach
    @else
        <div class="comment clearfix">Комментариев пока нет</div>
    @endif
</div>
