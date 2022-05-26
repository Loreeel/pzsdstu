
function newNews(body)
{
    const url = '../database/createNews.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function deleteNews(id)
{
    alert(id)
    let body = {"id":id}
    const url = '../database/deleteNews.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function updateNews(body)
{
    const url = '../database/updateNews.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function selectOneNews(id,callback)
{
    let body = {"id":id}
    const url = '../database/selectOneNews.php'
    sendFetchRequest('POST',url,body).then( data=>
    {
        callback(data)
    })
}