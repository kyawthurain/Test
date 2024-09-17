

$(document).ready(function(){

    $(document).on('click','.btnDelete',function(){
        let btnDelete = $(this)
        let tr= btnDelete.parent().parent()
        let id=tr.attr('id')
        let status=confirm("Are you sure to delete?")
        if(status){
            $.ajax({
                url: "delete-brandajax.php",
                type: "method",
                method: "post",
                data: {id:id},

                success: function (response) {
                    let result = JSON.parse(response)
                    if(result.status == 'true'){

                        window.location.reload()
                    }else{
                        alert("Can't delete")
                    }
                }
            });
        }
    })

    $(document).on('click','.btnDeleteProduct',function(){
        let btnDelete = $(this)
        let tr= btnDelete.parent().parent()
        let id=tr.attr('id')
        let status=confirm("Are you sure to delete?")
        if(status){
            $.ajax({
                url: "delete-productajax.php",
                type: "method",
                method: "post",
                data: {id:id},
                success: function (response) {
                    let result = JSON.parse(response)
                    if(result.status == 'true'){
                        window.location.reload()
                    }else{
                        alert("Can't delete")
                    }
                }
            });
        }
    })

    $(document).on('click','.btnDeleteStore',function(){
        let btnDelete = $(this)
        let tr= btnDelete.parent().parent()
        let id=tr.attr('id')
        let status=confirm("Are you sure to delete?")
        if(status){
            $.ajax({
                url: "delete-storeajax.php",
                type: "method",
                method: "post",
                data: {id:id},
                success: function (response) {
                    let result = JSON.parse(response)
                    if(result.status == 'true'){
                        window.location.reload()
                    }else{
                        alert("Can't delete")
                    }
                }
            });
        }
    })

    $('.btnSearch').click(function(){

        let data = $('.search').val()
        // console.log(data)
        let tbody = $('.tbody')
        if(data.length>0){

            $.ajax({

                method: "post",
                url: "search.php",
                data: {value:data},
                success: function (response) {
                    tbody.children().remove()
                    tbody.append(response)
                }
            });

        }else{
            alert("please enter a value")
        }
    })

  

})
