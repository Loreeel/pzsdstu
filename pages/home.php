<?php
    include("../modules/header.php")
?>
<script type="text/javascript" src="../js/tableAdapter.js"></script>
<script type="text/javascript" src="../js/requests.js"></script>
<div class="container">
    <div class="row">
        <script type="text/javascript">
            //fill table
            /*const request = new XMLHttpRequest();
            const url = "../database/test.php"

            request.open("POST",url,true)
            request.setRequestHeader("Content-type","application/json")
            request.addEventListener("readystatechange",()=>{
                if(request.readyState===4 && request.status===200) {
                    let col = ['id', 'name']
                    let table = new TableAdapter(JSON.parse(request.responseText),"Title")

                    document.getElementById("test").innerHTML=table.getViewTable(col)+table.getDropDownList("name")
                    console.log()
                }
            })
            request.send()*/
            /*const url = "../database/test.php"
            sendXhrRequest('POST',url).then(
                data=>
                {
                    let col = ['id', 'name']
                    let table = new TableAdapter(data,"Title")
                    document.getElementById("test").innerHTML=table.getViewTable(col)+table.getDropDownList("name")
                }
            )*/
            const url = "../database/select.php"
            sendFetchRequest('POST',url,
            {
                "table": "NewTest"
            })
            .then( data=>
            {
                let content = data
                let col = ['id', 'name','age']
                let table = new TableAdapter(content,"Title")
                document.getElementById("test").innerHTML+=table.getViewTable(col)+table.getDropDownList("name")
            })
        </script>

        <div id="test" class="col-lg "> </div>
        <div class="col-lg ">
            <div class="ratio ratio-16x9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/hp2CkXlfyMo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>

    </div>

    <div class="row mt-5 d-none">
        <form method="post" action="../database/register.php">
            <div class="row mb-3">
                <label for="login" class="col-sm-2 col-form-label">Логін</label>
                <div class="col-sm-10">
                    <input name="login" id="login" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="pass" class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                    <input name="pass" id="pass" type="password" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Ім'я</label>
                <div class="col-sm-10">
                    <input name="name" id="pass" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <button type="submit" class="btn btn-success" >Зареєструвати</button>
            </div>
        </form>
    </div>
</div>
<?php include("../modules/footer.php") ?>



