<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<main class="w-100 m-auto">
    <form>
        <h1 class="h3 mb-3 fw-normal">Загрузите файлы</h1>
        <div class="form">
            <div>
                <label for="fileInput1" class="p-2">Файл 1</label>
                <input type="file" name='files[]' class="form-control py-6" id="fileInput1">
            </div>
            <div>
                <label for="fileInput2" class="p-2">Файл 2</label>
                <input type="file" name='files[]' class="form-control py-6" id="fileInput2">
            </div>
            <div>
                <label for="fileInput3" class="p-2">Файл 3</label>
                <input type="file" name='files[]' class="form-control py-6" id="fileInput3">
            </div>
            <div>
                <label for="fileInput4" class="p-2">Файл 4</label>
                <input type="file" name='files[]' class="form-control py-6" id="fileInput4">
            </div>
            <div>
                <label for="fileInput5" class="p-2">Файл 5</label>
                <input type="file" name='files[]' class="form-control py-6" id="fileInput5">
            </div>
        </div>
    </form>
</main>
