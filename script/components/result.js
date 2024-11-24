"use strict";

const resultPage = document.querySelector(".resultPage");

if (resultPage) {
    /* Функция для получения данных из localStorage с обработкой ошибок */
    function getDataFromStorage(key, defaultValue = {}) {
        try {
            return JSON.parse(localStorage.getItem(key)) || defaultValue;
        } catch (error) {
            console.error(
                `Ошибка при получении данных ${key} из localStorage:`,
                error
            );
            return defaultValue;
        }
    }

    /* Получение данных из localStorage */
    const testResults = getDataFromStorage("testResults");

    if (Object.keys(testResults).length === 0) {
        window.document.location = "/check";
    } else {
        const units = getDataFromStorage("units");
        let chartData = [];

        /* Селекторы для элементов страницы */
        const normweight = document.querySelector("#normweight");
        const imt = document.querySelector("#imt");
        const imtCircle = document.querySelector("#imtCircle");
        const age = document.querySelector("#age");
        const heightweight = document.querySelector("#heightweight");
        const forecast = document.querySelector("#forecast");
        const firstWeek = document.querySelector("#firstWeek");
        const calories = document.querySelector("#calories");
        const waterRate = document.querySelector("#waterRate");
        const promptName = document.querySelector("#prompt__name");
        const promptArrayName = [
            "Выраженный дефицит массы тела",
            "Недостаточная масса тела",
            "Норма",
            "Избыточная масса тела",
            "Ожирение 1-й степени",
            "Ожирение 2-й степени",
            "Ожирение 3-й степени",
        ];

        /* Расчет ИМТ */
        function calculateIMT(weight, height) {
            const heightInMeters = height / 100;
            return Math.round(weight / Math.pow(heightInMeters, 2));
        }

        const imtValue = calculateIMT(testResults.weight, testResults.height);

        /* Обновление UI на основе данных */
        function updateUI() {
            age.innerHTML = getAgeString(testResults.age);
            heightweight.innerHTML = `${testResults.height} ${units.unitOfWeight1} / ${testResults.weight} ${units.unitOfWeight}`;
            imt.innerHTML = imtValue;
            calories.innerHTML = `${Math.floor(getCalories(testResults))} кКал`;
            waterRate.innerHTML = `${calculateWaterRate(
                testResults.weight
            ).toFixed(1)} л`;
            imtCircle.style.left = `${calculateIMTPosition(imtValue)}%`;

            console.log(calculateIMTPosition(imtValue));

            updatePromptName(imtValue);
        }

        /* Функция для расчета количества калорий */
        function getCalories({ gender, weight, height, age, sport }) {
            const baseCalories =
                gender[0] === "Женщина"
                    ? 10 * weight + 6.25 * height - 5 * age - 161
                    : 10 * weight + 6.25 * height - 5 * age + 5;

            const physicalActivity = {
                sport1: 0.7,
                sport2: 0.8,
                sport3: 1,
                sport4: 1.2,
                sport5: 1.6,
            };

            return baseCalories * (physicalActivity[sport[0]] || 1);
        }

        /* Расчет потери веса за первую неделю */
        function getFirstWeekWeightLoss(weight, normalWeight) {
            return ((weight - normalWeight) * 0.18).toFixed(1);
        }

        /* Функция для генерации данных графика */
        function getChartData(initialWeight, firstWeekWeight, finalWeight) {
            const weightLastWeek =
                firstWeekWeight - (firstWeekWeight - finalWeight) / 2;
            return [
                initialWeight,
                firstWeekWeight,
                weightLastWeek,
                finalWeight,
            ];
        }

        /* Определение плана (набор или потеря веса) и обновление UI */
        function updatePlan() {
            const plan =
                testResults.normalWeight > testResults.weight ? "min" : "max";
            const differentWeight = Math.abs(
                testResults.normalWeight - testResults.weight
            );
            const firstWeekWeightLoss = getFirstWeekWeightLoss(
                testResults.weight,
                testResults.normalWeight
            );

            if (plan === "min") {
                forecast.innerHTML = "Прогноз набора веса";
                normweight.innerHTML = `${differentWeight} ${units.unitOfWeight}`;
                firstWeek.innerHTML = `${firstWeekWeightLoss} ${units.unitOfWeight}`;
                chartData = getChartData(
                    testResults.weight,
                    Number(testResults.weight) + Number(firstWeekWeightLoss),
                    testResults.normalWeight
                );
            } else {
                forecast.innerHTML = "Прогноз снижения веса";
                normweight.innerHTML = `${differentWeight} ${units.unitOfWeight}`;
                firstWeek.innerHTML = `-${firstWeekWeightLoss} ${units.unitOfWeight}`;
                chartData = getChartData(
                    testResults.weight,
                    Number(testResults.weight) - Number(firstWeekWeightLoss),
                    testResults.normalWeight
                );
            }
        }

        /* Расчет нормы потребления воды */
        function calculateWaterRate(weight) {
            return (0.02835 * weight) / (2 * 0.4536);
        }

        /* Определение позиции кружка на шкале ИМТ */
        function calculateIMTPosition(imt) {
            if (imt <= 16) return 10;
            if (imt > 16 && imt <= 18.5) return 25;
            if (imt > 18.5 && imt <= 25) return 40;
            if (imt > 25 && imt <= 30) return 75;
            if (imt > 30 && imt <= 35) return 80;
            if (imt > 35 && imt <= 40) return 90;
            return 90;
        }

        /* Обновление текста категории ИМТ */
        function updatePromptName(imtValue) {
            if (imtValue < 16) promptName.innerHTML = promptArrayName[0];
            else if (imtValue >= 16 && imtValue < 18.5)
                promptName.innerHTML = promptArrayName[1];
            else if (imtValue >= 18.5 && imtValue < 25)
                promptName.innerHTML = promptArrayName[2];
            else if (imtValue >= 25 && imtValue < 30)
                promptName.innerHTML = promptArrayName[3];
            else if (imtValue >= 30 && imtValue < 35)
                promptName.innerHTML = promptArrayName[4];
            else if (imtValue >= 35 && imtValue < 40)
                promptName.innerHTML = promptArrayName[5];
            else promptName.innerHTML = promptArrayName[6];
        }

        /* Корректный вывод возраста с окончанием */
        function getAgeString(age) {
            const count = age % 100;
            if (count >= 5 && count <= 20) return `${age} лет`;

            const remainder = age % 10;
            if (remainder === 1) return `${age} год`;
            if (remainder >= 2 && remainder <= 4) return `${age} года`;
            return `${age} лет`;
        }

        // const Highcharts = require('highcharts');

        /* Отрисовка графика с использованием Highcharts */
        function renderChart(chartData) {
            chartData = chartData.map((item) => Number(item));

            Highcharts.chart("container", {
                legend: {
                    layout: "vertical",
                    align: "right",
                    verticalAlign: "middle",
                },
                series: [{ name: "", data: [...chartData] }],
                responsive: {
                    rules: [
                        {
                            condition: { maxWidth: 500 },
                            chartOptions: {
                                legend: {
                                    layout: "horizontal",
                                    align: "center",
                                    verticalAlign: "bottom",
                                },
                            },
                        },
                    ],
                },
            });
        }

        const circle = document.querySelector(".progress-ring__circle");
        const radius = circle.r.baseVal.value;
        const persentValue = document.querySelector("#present");
        const preloader = document.querySelector(".result__preloader");
        const resultBlock = document.querySelector("#result-block");

        const circumference = 2 * Math.PI * radius;

        circle.style.strokeDasharray = `${circumference} ${circumference}`;
        circle.style.strokeDashoffset = circumference;

        function setProgress(percent) {
            const offset = circumference - (percent / 100) * circumference;
            circle.style.strokeDashoffset = offset;
        }

        var startProgress = 0;
        setTimeout(() => {
            var refreshIntervalId = setInterval(() => {
                startProgress++;
                setProgress(startProgress);
                persentValue.innerHTML = `${startProgress}%`;
                if (startProgress === 100) {
                    clearInterval(refreshIntervalId);
                    setTimeout(() => {
                        resultBlock.style.opacity = "1";
                        resultBlock.style.height = "auto";
                        preloader.style.opacity = "0";
                        preloader.style.height = "0";

                        setTimeout(() => {
                            resultBlock.style.display = "block";
                            preloader.style.display = "none";
                        }, 200);
                    }, 1000);
                }
            }, 40);
        }, 1000);

        function calculateDailyCalories({
            gender,
            weight,
            height,
            age,
            activityLevel,
        }) {
            // Рассчитываем BMR
            const bmr =
                gender === "Мужчина"
                    ? 10 * weight + 6.25 * height - 5 * age + 5
                    : 10 * weight + 6.25 * height - 5 * age - 161;

            // Учитываем физическую активность
            const activityFactors = {
                low: 1.2,
                light: 1.375,
                moderate: 1.55,
                high: 1.725,
                veryHigh: 1.9,
            };

            // const dailyCalories = bmr * (activityFactors[activityLevel] || 1.2);
            const dailyCalories = Math.floor(getCalories(testResults));

            // Процентное распределение макронутриентов
            const proteinPercentage = 0.2;
            const fatPercentage = 0.3;
            const carbsPercentage = 0.5;

            // Рассчитываем количество граммов белков, жиров и углеводов
            const proteinGrams = (dailyCalories * proteinPercentage) / 4;
            const fatGrams = (dailyCalories * fatPercentage) / 9;
            const carbsGrams = (dailyCalories * carbsPercentage) / 4;

            return {
                dailyCalories: Math.round(dailyCalories),
                proteinGrams: proteinGrams.toFixed(2),
                fatGrams: fatGrams.toFixed(2),
                carbsGrams: carbsGrams.toFixed(2),
            };
        }

        console.log(testResults);

        // Пример использования функции
        const user = {
            gender: "Женщина",
            weight: testResults.weight, // Вес в кг
            height: testResults.height, // Рост в см
            age: testResults.age, // Возраст
            activityLevel: "moderate", // Уровень активности
        };

        const result = calculateDailyCalories(user);
        console.log(
            `Ваша суточная норма калорий: ${result.dailyCalories} кКал`
        );
        console.log(
            `Белки: ${result.proteinGrams} г, Жиры: ${result.fatGrams} г, Углеводы: ${result.carbsGrams} г`
        );

        let belkiBox = document.querySelector('#belki');
        let giriBox = document.querySelector('#giri');
        let uglevodsBox = document.querySelector('#uglevods');

        belkiBox.innerHTML = parseInt(result.proteinGrams)  + ' г';
        giriBox.innerHTML = parseInt(result.fatGrams)  + ' г';
        uglevodsBox.innerHTML = parseInt(result.carbsGrams)  + ' г';

        /* Инициализация всех расчетов и отрисовки */
        function init() {
            updateUI();
            updatePlan();
            renderChart(chartData);
        }

        /* Запуск приложения */
        init();
    }
}
