$(document).ready(function () {
    $(".__deleteUser").click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "Once deleted, you will not be able to recover this imaginary file!",
            type: 'warning',
            confirmButtonText: 'Yes, delete it!',
            showCancelButton: true,
            confirmButtonColor: '#0084ff',
            cancelButtonColor: '#d33',
            reverseButtons: true,
            showCloseButton: true
        }).then((result) => {
            if (result.value) {
                let id = $(this).attr("data-id")
                let _this = $(this)
                $.ajax({
                    url: '/PHP_Rush_MVC/WebRoot/admin/users/deleteUser?id='+id,
                    //url: '/admin/users/delete/' + id,
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id
                    },
                    success: function (r) {
                        if (r) {
                            _this.closest('tr').remove()
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'User has been deleted.',
                                type: 'success',
                                timer: 1000
                            })
                        }
                    }
                })
            }
        })
    })
})