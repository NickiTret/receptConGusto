<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main class="resultPage">
            <section class="search__nav">
                <div class="container">
                    <div class="result__preloader">
                        <h1 class="result__title">Обработка данных</h1>
                        <p class="result__subtitle">
                            Ваш персональный план питания формируется
                        </p>
                        <div class="result__percent">
                            <svg class="progress-ring" width="250" height="250">
                                <circle class="progress-ring__circle" stroke="#f97b25" stroke-width="20" cx="125"
                                    cy="125" r="110" fill="transparent"></circle>
                            </svg>
                            <span id="present">0%</span>
                        </div>
                    </div>



                    <article id="result-block">
                        <section class="results">
                            <div class="container">
                                <h1 class="results__title">
                                    Прогноз результатов на основе ваших ответов
                                </h1>
                                <div class="results__forecast forecast">
                                    <div class="results__weight results__card">
                                        <p class="results__card-title" id="forecast">
                                            Прогноз снижения веса
                                        </p>
                                        <div class="results__weight-value" id="normweight">-40 кг</div>
                                        <div class="results__weight-img highcharts-figure">
                                            <div id="container"></div>
                                        </div>
                                    </div>
                                    <div class="forecast__points">
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/fire.png" alt="fire" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">
                                                    Результат после первой недели
                                                </div>
                                                <div class="results__card-text" id="firstWeek">-7 кг</div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/water.png" alt="water" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Дневной минимум воды</div>
                                                <div class="results__card-text" id="waterRate">2,8 л</div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/norm.png" alt="norm" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Дневная норма калорий</div>
                                                <div class="results__card-text" id="calories">1654 кКал</div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/belki.jpg" alt="arrows" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Рекомендуемая суточная норма белков:</div>
                                                <div class="results__card-text" id="belki">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/giri.jpg" alt="arrows" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Рекомендуемая суточная норма жиров:</div>
                                                <div class="results__card-text" id="giri">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/ugle.jpg" alt="arrows" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Рекомендуемая суточная норма углеводов:</div>
                                                <div class="results__card-text" id="uglevods">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/v-result.png" alt="v-result" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">
                                                    Первый видимый результат за
                                                </div>
                                                <div class="results__card-text">10 дней</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="results__title">Обзор вашего профиля</h4>
                                <div class="results__data data">
                                    <div class="results__imt results__card">
                                        <div class="results__imt-title">Ваш ИМТ сейчас</div>
                                        <div class="results__imt-value" id="imt">33.06</div>
                                        <div class="results__imt-line line">
                                            <div class="line__title">
                                                Ваш вес:
                                                <span id="prompt__name"></span>
                                            </div>
                                            <div class="line__body">
                                                <div class="line__body-scale scale">
                                                    <div class="scale__circle" id="imtCircle"></div>
                                                </div>
                                                <div class="line__body-prompt prompt">
                                                    <div class="prompt__item">Недостаточный вес</div>
                                                    <div class="prompt__item">В пределах нормы</div>
                                                    <div class="prompt__item">Ожирение</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="forecast__points data__points">
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/user.png" alt="user" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Возраст</div>
                                                <div class="results__card-text" id="age">54 года</div>
                                            </div>
                                        </div>
                                        <div class="forecast__points-item results__card">
                                            <div class="results__card-img">
                                                <img src="img/arrows.png" alt="arrows" />
                                            </div>
                                            <div class="results__card-data">
                                                <div class="results__card-title">Рост / Вес</div>
                                                <div class="results__card-text" id="heightweight">
                                                    165 см / 90 кг
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>

                        {{-- <section class="can">
                            <div class="can__container container">
                                <img class="can__img" src="img/can.svg" alt="" />
                                <div class="can__text">
                                    <div class="can__text-title">Да, вы точно сможете!</div>
                                    <p>106,177 kg — суммарный вес, который сбросили наши пользователи</p>
                                </div>
                            </div>
                        </section> --}}
{{--
                        <section class="zones">
                            <div class="container">
                                <div class="zones__title">Уменьшите объем таких проблемных зон:</div>
                                <div class="zones__body">
                                    <div class="zones__text">
                                        <p>
                                            Висцеральный жир — это оболочка ваших органов, увеличивающая объем
                                            тела. Этот тип жира наиболее опасен, поскольку влияет не только на
                                            вашу фигуру, но и на ваше здоровье и гормональный фон.
                                        </p>
                                        <p>
                                            Мы уже составили индивидуальный план питания, который будет
                                            способствовать потере подкожного и висцерального жира.
                                        </p>
                                    </div>
                                    <div class="zones__img">
                                        <p class="zones__img-point">Подбородок</p>
                                        <p class="zones__img-point">Грудь</p>
                                        <p class="zones__img-point">Живот</p>
                                        <p class="zones__img-point">Ноги</p>
                                        <p class="zones__img-point">Руки</p>
                                        <p class="zones__img-point">Попа</p>
                                    </div>
                                </div>
                            </div>
                        </section> --}}

                        {{-- <section class="receive">
                            <div class="container">
                                <h2 class="receive_title">Что вы получите?</h2>
                                <div class="receive__item">
                                    <div class="receive__item-desc desc">
                                        <div class="desc__title">Персональный план питания</div>
                                        <p>
                                            Этот план разработан на основе ваших ответов. Все рецепты созданы
                                            профессиональными диетологами. Каждый рецепт содержит перечень
                                            ингредиентов, пошаговую инструкцию по приготовлению и информацию
                                            об энергетической ценности. Не нужно подсчитывать калории, мы
                                            сделали это за вас.
                                        </p>
                                    </div>
                                    <div class="receive__item-img">
                                        <img src="img/receive1.jpg" alt="receive1" />
                                    </div>
                                </div>
                                <div class="receive__item">
                                    <div class="receive__item-desc desc">
                                        <div class="desc__title">Упражнения для ускорения метаболизма</div>
                                        <p>
                                            Этот комплекс упражнений не займет много времени, но поможет
                                            значительно улучшить состояние здоровья, качество сна и
                                            стрессоустойчивость. Избавляйтесь от лишних килограммов с помощью
                                            нашего плана питания!
                                        </p>
                                    </div>
                                    <div class="receive__item-img">
                                        <img src="img/receive2.jpg" alt="receive2" />
                                    </div>
                                </div>
                                <div class="receive__item">
                                    <div class="receive__item-desc desc">
                                        <div class="desc__title">Онлайн поддержка</div>
                                        <p>
                                            Мы на связи 24/7 и готовы ответить на любые вопросы и помочь
                                            решить любые проблемы.
                                        </p>
                                        <p>
                                            Наши специалисты отдела поддержки передадут ваш запрос
                                            профессиональному диетологу и помогут разобраться со всеми
                                            вопросами, которые у вас могут возникнуть.
                                        </p>
                                    </div>
                                    <div class="receive__item-img">
                                        <img src="img/receive3.jpg" alt="receive3" />
                                    </div>
                                </div>
                                <div class="receive__item">
                                    <div class="receive__item-desc desc">
                                        <div class="desc__title">
                                            Гайды: Прерывистое голодание, ходьба, бег и другое
                                        </div>
                                        <p>
                                            В дополнение к персонализированному приложению для похудения мы
                                            даем вам информацию о популярных методах питания и упражнений.
                                            Узнайте, как:
                                        </p>
                                        <ul>
                                            <li>• Как избавиться от боли в коленях во время бега</li>
                                            <li>• Как безопасно попробовать прерывистое голодание</li>
                                            <li>• Определите подходит ли вам Кето-диета</li>
                                        </ul>
                                    </div>
                                    <div class="receive__item-img">
                                        <img src="img/receive4.jpg" alt="receive4" />
                                    </div>
                                </div>
                                <div class="receive__item">
                                    <div class="receive__item-desc desc">
                                        <div class="desc__title">Образовательные материалы</div>
                                        <p>
                                            Наша миссия — не просто подготовить вас к лету или отпуску. Мы
                                            хотим подготовить вас к реальной жизни, в которой вы научитесь
                                            легко принимать правильные решения по питанию.
                                        </p>
                                    </div>
                                    <div class="receive__item-img">
                                        <img src="img/receive5.jpg" alt="receive5" />
                                    </div>
                                </div>
                                <a href="plan.html" class="receive__btn btn">Получить план</a>
                            </div>
                        </section> --}}

                        {{-- <section class="additional">
                            <div class="container">
                                <h2 class="additional__title">Дополнительные преимущества</h2>
                                <div class="additional__item">
                                    <input type="checkbox" id="additional1" />
                                    <label for="additional1" class="additional__item-toggle">
                                        <span>Улучшение интимного здоровья</span>
                                        <svg class="additional__item-img" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                stroke="#F47B1B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9 12H15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 9V15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="additional__item-minus" />
                                        </svg>
                                    </label>
                                    <div class="additional__item-body">
                                        Исследование штата Пенсильвания, проведенное в 2012 году и
                                        посвященное бесплодию, показало, что у женщин, снизивших вес,
                                        улучшилась сексуальная функция. Многие заметили ощутимые изменения.
                                        Кроме того, из-за избыточного веса и, как следствие, высокого уровня
                                        холестерина, в кровеносных сосудах накапливаются бляшки, которые
                                        затем замедляют приток крови к репродуктивным органам, что
                                        затрудняет их функционирование.
                                    </div>
                                </div>

                                <div class="additional__item">
                                    <input type="checkbox" id="additional2" />
                                    <label for="additional2" class="additional__item-toggle">
                                        <span>Экономия</span>
                                        <svg class="additional__item-img" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                stroke="#F47B1B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9 12H15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 9V15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="additional__item-minus" />
                                        </svg>
                                    </label>
                                    <div class="additional__item-body">
                                        Согласно исследованию 2009 года, опубликованному в журнале Health
                                        Affairs, люди с нормальным весом тратят меньше денег на медицинские
                                        счета и расходы, чем их сверстники с избыточным весом. В частности,
                                        исследователи обнаружили, что люди с ожирением тратят на 1429
                                        долларов (или 42%) больше, чем их сверстники с нормальным весом.
                                        Значительная часть этих средств идет на рецептурные лекарства,
                                        необходимые для лечения хронических заболеваний. А отчет 2014 года о
                                        жителях Мичигана показал, что ежегодные расходы на здравоохранение
                                        для людей, страдающих чрезвычайным ожирением, были на колоссальные
                                        90% выше, чем у людей с нормальным весом.
                                    </div>
                                </div>

                                <div class="additional__item">
                                    <input type="checkbox" id="additional3" />
                                    <label for="additional3" class="additional__item-toggle">
                                        <span>Улучшение здоровья</span>
                                        <svg class="additional__item-img" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                                                stroke="#F47B1B" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9 12H15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 9V15" stroke="#F47B1B" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="additional__item-minus" />
                                        </svg>
                                    </label>
                                    <div class="additional__item-body">
                                        Согласно исследованию 2009 года, опубликованному в журнале Health
                                        Affairs, люди с нормальным весом тратят меньше денег на медицинские
                                        счета и расходы, чем их сверстники с избыточным весом. В частности,
                                        исследователи обнаружили, что люди с ожирением тратят на 1429
                                        долларов (или 42%) больше, чем их сверстники с нормальным весом.
                                        Значительная часть этих средств идет на рецептурные лекарства,
                                        необходимые для лечения хронических заболеваний. А отчет 2014 года о
                                        жителях Мичигана показал, что ежегодные расходы на здравоохранение
                                        для людей, страдающих чрезвычайным ожирением, были на колоссальные
                                        90% выше, чем у людей с нормальным весом.
                                    </div>
                                </div>
                            </div>
                        </section> --}}
                    </article>






                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/series-label.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                </div>
            </section>


            <a id="confirmLink" href="email.html" style="display: none;"></a>
        </main>
        @include('Main.footer')
    </div>
</body>

</html>
