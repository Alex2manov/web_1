<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="fon1 tab mt-4 mb-4 shadow rounded" id="quf">
        <form action="index.php" method="POST" class="row mx-5 my-2 gy-1">
            <div class="form_item form-group">
                <label for="formName" style="color: black;">ФИО:</label>
                <input type="text" class="form_input _req form-control w-50 shadow bg-white rounded" name="name"
                    id="formName" placeholder="Введите ФИО">
            </div>

            <div class="form_item form-group">
                <label for="formTel" style="color: black;">Телефон:</label>
                <input type="tel" class="form_input _req form-control w-50 shadow bg-white rounded" name="phone" 
                    id="formTel" placeholder="Введите телефон">
            </div>

            <div class="form_item form-group">
                <label for="formEmail" style="color: black;">E-mail:</label>
                <input type="email" class="form_input _req _email form-control w-50 shadow bg-white rounded" id="formEmail"
                    name="email" placeholder="Введите E-mail">
            </div>

            <div class="form_item form-group">
                <label for="formDate" style="color: black;">Дата рождения:</label>
                <input type="date" class="form_input _req form-control w-50 shadow bg-white rounded" name="date" value=""
                    min="1900-01-01" max="2024-03-01" id="formDate">
            </div>

            <div class="form_item form-group">
                <label style="color: black;">Пол:</label><br>
                <div class="form-check1 form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="Sex1" value="m">
                    <label class="form-check-label" for="Sex1">Мужской</label>
                </div>
                <div class="form-check1 form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="Sex2" value="f">
                    <label class="form-check-label" for="Sex2">Женский</label>
                </div>
            </div>            

            <div class="form_item form-group">
                <label for="multipleLanguages" style="color: black;">Любимый язык программирования:</label>
                    <select multiple class="form_input _req form-control w-50 shadow bg-white rounded" id="multipleLanguages" name="Languages[]">
                        <option value="Pascal">Pascal</option>
                        <option value="C">C</option>
                        <option value="C_plus_plus">C++</option>
                        <option value="JavaScript">JavaScript</option>
                        <option value="PHP">PHP</option>          
                        <option value="Python">Python</option>
                        <option value="Java">Java</option>
                        <option value="Haskel">Haskel</option>
                    </select>
            </div>

            <div class="form_item form-group">
                <label for="formMessage" style="color: black;">Биография:</label>
                <textarea id="formMessage" name="biography"
                    class="form_input _req form-control w-50 shadow bg-white rounded"></textarea>
            </div>

            <div class="form_item form-group">
                <div class="form-check">
                    <label class="checkbox_label form-check-label" for="agree">С контрактом ознакомлен(а)</label>
                    <input id="agree" type="checkbox" name="agree" class="checkbox_input form-check-input">
                </div>
            </div>
            
            <div class="form_item form-group">
                <label class="col-12"><input type="submit" value="Сохранить" name="submit" class="submit btn-dark"></label>
            </div>
        </form>
    </div>
</body>
