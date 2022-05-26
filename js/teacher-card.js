
function newTeacher(body)
{
    const url = '../database/createTeacher.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function deleteTeacher(id)
{
    alert(id)
    let body = {"id":id}
    const url = '../database/deleteTeacher.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function updateTeacher(body)
{
    const url = '../database/updateTeacher.php'
    AJAX(body,url,function (){
        document.location.reload()
    })
}

function selectOneTeacher(id,callback)
{
    let body = {"id":id}
    const url = '../database/selectOneTeacher.php'
    sendFetchRequest('POST',url,body).then( data=>
    {
        callback(data)
    })
}