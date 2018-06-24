            
            $("select[name='deparment']").change(function(){
                var department_id = $(this).val();
                var token = $("input[name='_token']").val();
                $.ajax({
                    url: '/QLStudent/public/showCourseInDepartment',
                    method: 'POST',
                    data: {
                        department_id: department_id,
                        _token: token
                    },
                    success: function(data) {
                        $("select[name='course_name'").html('');
                        $.each(data, function(key, value){
                            $("select[name='course_name']").append(
                                "<option value=" + value.id + ">" + value.course_name + "</option>"
                                );
                        });
                    }
                });
            });