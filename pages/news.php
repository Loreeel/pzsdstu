<?php include("../modules/header.php") ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['role'] == 1)
        echo
        '<div class="container my-2 mx-0">
                 <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addNewsModal" >Створити новину</button>
            </div>';
}
?> <!--check role and draw addNews button-->


    <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="d-none" id="news-id"></label>
                    <h5 class="modal-title" id="editNewsModalLabel">Редагуванняння новини</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="news-title" class="col-form-label">Заголовок новини:</label>
                            <input type="text" class="form-control" id="news-title">
                        </div>
                        <div class="mb-3">
                            <label for="news-text" class="col-form-label">Текст новини:</label>
                            <textarea class="form-control" id="news-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="news-image" class="col-form-label">Посилання на зображення</label>
                            <input class="form-control" id="news-image">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button onclick="updNews()" type="button" class="btn btn-primary">Зберегти</button>
                </div>
            </div>
            <!--update news and fill updating form-->
            <script>
                function updNews()
                {
                    let editNewsModal = document.getElementById('editNewsModal')
                    let newsTitle = editNewsModal.querySelector('#news-title')
                    let newsContent = editNewsModal.querySelector('#news-text')
                    let newsImage = editNewsModal.querySelector('#news-image')
                    let newsId = editNewsModal.querySelector('#news-id')
                    console.log(newsId)
                    updateNews({
                        'id':newsId.textContent,
                        'title': newsTitle.value,
                        'content':newsContent.value,
                        'image':newsImage.value
                    })
                }
                let editNewsModal = document.getElementById('editNewsModal')
                editNewsModal.addEventListener('show.bs.modal', function (event) {
                    // Button that triggered the modal
                    let button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    let recipient = button.getAttribute('data-bs-whatever')
                    // If necessary, you could initiate an AJAX request here
                    // and then do the updating in a callback.
                    //
                    // Update the modal's content.
                    let newsId = editNewsModal.querySelector('#news-id')
                    newsId.textContent = recipient
                    selectOneNews(recipient,function (res)
                    {
                        let data = res[0]
                        let newsTitle = editNewsModal.querySelector('#news-title')
                        let newsContent = editNewsModal.querySelector('#news-text')
                        let newsImage = editNewsModal.querySelector('#news-image')

                        newsTitle.value = data['title']
                        newsContent.value = data['content']
                        newsImage.value = data['image']
                    })
                })
            </script>
        </div>
    </div>

    <div class="container" id="newsList">
        <script>
            function createNews()
            {
                //let title = document.getElementById('add-news-title').value
                //let content = document.getElementById('add-news-text').value
                //let image = document.getElementById('add-news-image').value
                //let date = new Date()
                newNews(
                    {
                        'title':document.getElementById('add-news-title').value,
                        'content':document.getElementById('add-news-text').value,
                        'image': document.getElementById('add-news-image').value,
                        'date':new Date().toISOString().split('T')[0]
                    })
            }

            let role ='<?php echo $_SESSION['role'];?>';

            const url = "../database/select.php"
            sendFetchRequest('POST',url,
                {
                    "table": "News"
                })
                .then( data=>
                {
                    const table = new TableAdapter(data)
                    document.getElementById("newsList").innerHTML+=table.getNewsItem(role)
                })

        </script> <!--create news script and fill newsList by role-->
    </div>

    <div class="modal fade"  id="addNewsModal" tabindex="-1" aria-labelledby="addNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewsModalLabel">Створення новини</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="news-title" class="col-form-label">Заголовок новини:</label>
                            <input type="text" class="form-control" id="add-news-title">
                        </div>
                        <div class="mb-3">
                            <label for="news-text" class="col-form-label">Текст новини:</label>
                            <textarea class="form-control" id="add-news-text"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="news-image" class="col-form-label">Посилання на зображення</label>
                            <input class="form-control" id="add-news-image">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    <button onclick="createNews()" type="button" class="btn btn-primary">Створити</button>
                </div>
            </div>
        </div>
    </div>


<?php include("../modules/footer.php") ?>