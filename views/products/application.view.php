<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="padding">
    <h2 class="application-h">Оформить заявку</a></h2>

    <form class="form-application" action="/app/tables/products/insert.application.php" method="POST">

        <div class="application-all">
            <p class="user-hello"><?= $user->name ?>, здравствуйте!</p>

            <div class="select-dog">
                <p class="name-check">Выберите собаку:</p>
                <div class="select-name">
                    <?php foreach ($pets as $pet) : ?>
                        <input type="radio" id="<?= $pet->id ?>" name="pet_id" value="<?= $pet->id ?>">
                        <label class="for-name" for="<?= $pet->id ?>"><?= $pet->pet ?></label>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="select-services-block">
                <p class="services-check">Выберите желаемые услуги:</p>
                <div class="select-services">
                    <?php foreach ($services as $service) : ?>
                        <input type="checkbox" class="servuses" id="ser<?= $service->id ?>" data-duratation="<?= $service->duration ?>" data-price="<?= $service->price ?>" name="service_id[]" value="<?= $service->id ?>">
                        <label for="ser<?= $service->id ?>"><?= $service->name ?> - <?= (int)$service->price ?> ₽</label>
                        <input type="hidden" disabled name="total_duration[]" value="<?= $service->duration ?>" id="<?= $service->id ?>">
                    <?php endforeach ?>
                </div>
            </div>
            <!-- <p class="price-applications"></p> -->


            <div class="date-box-application">
                <label for="date_provision" class="date-check">Выберите дату посещения:</label>
                <input type="text" id="date_provision" name="date_provision">
            </div>

            <p class="worker-check">Выберите мастера:</p>
            <div class="workers-box-application">
                <div class="workers-application">
                    <?php foreach ($workers as $worker) : ?>
                        <!-- <img src="/upload/<?= $worker->image ?>" for="" alt="" style="width: 50px;"> -->
                        <input type="radio" class="workwers" id="work<?= $worker->id ?>" name="worker_id" value="<?= $worker->id ?>">
                        <label for="work<?= $worker->id ?>"> <img class="worker-check-photo" src="/upload/<?= $worker->image ?>" style="width: 50px;" alt=""> <br><?= $worker->name ?></label>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="time-box-application">
                <p class="time-check">Выберите время посещения:</p>
                <div class="times_table">

                </div>
            </div>

            <!-- <?php if (!empty($_SESSION['error'])) : ?>
                <p class="error"><?= $_SESSION['error'] ?></p>
            <?php endif ?> -->

            <div class="btn-record-dog-app">
                <button class="btn-app" name="record-btn">отправить</button>
            </div>
        </div>

    </form>
</div>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/price.js"></script>
<script src="/assets/js/jquery.maskedinput.js"></script>
<script src="/assets/js/jquery-3.6.4.min.js"></script>
<script src="/assets/js/jquery-ui.min.js"></script>
<script src="/assets/js/mask.js"></script>
<script src="/assets/js/fetch.js"></script>
<script src="/assets/js/times.js"></script>
<script>
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);

    $(function() {
        var date = new Date();
        date.setDate(date.getDate());

        $("#date_provision").datepicker({
            minDate: date
        });

    });
</script>
<?php unset($_SESSION['error']);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>