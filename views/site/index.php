<div class="site-header">

    <p id="heading">To Do List Application</p>
    <p id="sub-heading">Where to-do items are added/deleted and belong to category</p>
</div>

<div class="content">

    <div class="add-form">
        <?= $this->render('../todo/_form', ['model' => $model]); ?>
    </div>


    <div class="showtable">
        <?= $this->render('../todo/index', ['dataProvider' => $dataProvider]); ?>
    </div>


</div>

<script>

    function addTask(e) {
        e.preventDefault();
        let form_data = $('#to-do-form').serializeArray();
        console.log(form_data);
        $.ajax({
            url: $('#to-do-form')[0].action,
            method: 'POST',
            data: form_data,
            success: function (data) {
                console.log(data);
             $('.showtable').html(data);
             $('#to-do-form')[0].reset();
          }
        })

    }

</script>