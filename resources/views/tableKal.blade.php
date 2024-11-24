<!DOCTYPE html>
<html lang="ru" class="page">

@include('Main.head')

<body class="page__body">
    @include('Main.header')
    <div class="site-container">
        <main>
            <section class="about_content">
                <div class="content">
                    <h1>Таблица калорийности продуктов и содержания БЖУ</h1>
                    <div class="container">
                        <p>

                            Таблица калорийности и содержания белков, жиров, углеводов в 100 граммах съедобной части
                            ключевых продуктов питания. Калорийность пищевых продуктов играет важную роль в диетах и
                            программах похудения, помогая составить оптимальный рацион.</p>
                        <p class="mob"><small>Листайте таблицу в право</small> </p>
                        <div class="table-custom-container">
                            <table class="table-custom">
                                <thead>
                                    <tr>
                                        <th>
                                            <a
                                                href="{{ route('tableKal', ['sort' => 'product_name', 'direction' => $sortField == 'product_name' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                                Название
                                                @if ($sortField == 'product_name')
                                                    @if ($sortDirection == 'asc')
                                                        &#9650; <!-- Стрелка вверх -->
                                                    @else
                                                        &#9660; <!-- Стрелка вниз -->
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a
                                                href="{{ route('tableKal', ['sort' => 'calories', 'direction' => $sortField == 'calories' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                                Калории, г
                                                @if ($sortField == 'calories')
                                                    @if ($sortDirection == 'asc')
                                                        &#9650;
                                                    @else
                                                        &#9660;
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a
                                                href="{{ route('tableKal', ['sort' => 'proteins', 'direction' => $sortField == 'proteins' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                                Белки, г
                                                @if ($sortField == 'proteins')
                                                    @if ($sortDirection == 'asc')
                                                        &#9650;
                                                    @else
                                                        &#9660;
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a
                                                href="{{ route('tableKal', ['sort' => 'fats', 'direction' => $sortField == 'fats' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                                Жиры, г
                                                @if ($sortField == 'fats')
                                                    @if ($sortDirection == 'asc')
                                                        &#9650;
                                                    @else
                                                        &#9660;
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        <th>
                                            <a
                                                href="{{ route('tableKal', ['sort' => 'carbohydrates', 'direction' => $sortField == 'carbohydrates' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                                                Углеводы, г
                                                @if ($sortField == 'carbohydrates')
                                                    @if ($sortDirection == 'asc')
                                                        &#9650;
                                                    @else
                                                        &#9660;
                                                    @endif
                                                @endif
                                            </a>
                                        </th>
                                        {{-- <th>Группа</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->calories }}</td>
                                            <td>{{ $product->proteins }}</td>
                                            <td>{{ $product->fats }}</td>
                                            <td>{{ $product->carbohydrates }}</td>
                                            {{-- <td>{{ $product->group->name ?? 'Без группы' }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                @if (!empty($news))
                    @include('Component.aside', ['posts' => $news])
                @endif
            </section>

            <style>
                .table-custom-container {
                    /* width: 100%; */
                    overflow: auto;
                }

                p.mob {
                    display: none;
                }

                .about_content .content {
                    width: 100%;
                }

                .table-custom {
                    width: 100%;
                    max-width: 100%;
                    border-collapse: collapse;
                    background-color: #f9f9f9;
                    margin: 20px 0;
                    font-size: 1em;
                    text-align: left;
                    /* table-layout: fixed; */
                }

                .table-custom th,
                .table-custom td {
                    padding: 12px 15px;
                    border: 1px solid #ddd;
                }

                .table-custom thead {
                    background-color: #9f6453;
                    color: white;
                    font-weight: bold;
                    text-transform: uppercase;
                }

                .table-custom tbody tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                .table-custom tbody tr:hover {
                    background-color: #9f6453;
                    color: #fff;
                    cursor: pointer;
                }

                .table-custom th {
                    background-color: #9f6453;
                    color: #fff;
                    text-align: center;
                }

                .table-custom td {
                    text-align: center;
                }

                .table-custom tbody tr {
                    transition: all 0.2s ease-in-out;
                }

                /* Убираем фиксированную ширину в медиа-запросе */
                @media (max-width: 768px) {
                    .table-custom {
                        width: 100%;
                    }

                    p.mob {
                        display: block;
                    }
                }
            </style>
        </main>
        <section class="links">
            <div class="container"></div>
        </section>
        @if (!empty($posts))
            <section class="pt-none">
                <div class="container">
                    <h2> Популярные рецепты </h2>
                </div>
            </section>
            @include('Component.hits', ['posts' => $posts])
        @endif
        @include('Main.footer')
    </div>
</body>

</html>
