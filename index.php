<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>

    <label for="shape">Choose a shape:</label>

    <select name="shape" id="shape">
        <option value="square">مربع</option>
        <option value="rectangle">مستطیل</option>
        <option value="circle">دایره</option>
        <option value="triangle">مثلث</option>
    </select>

    <table>
        <tbody>
            <tr>
                <td valign="top">
                    <table class="panel">
                        <form action="/area-calculator.html#rectangle" name="recform1"></form>
                        <tbody>
                            <tr class="box square rectangle triangle">
                                <td align="right">Height (H)</td>
                                <td align="right">
                                    <input type="number" name="recheight" value="20" class="inlong">
                                </td>
                            </tr>
                            <tr class="box rectangle">
                                <td align="right">width (W)</td>
                                <td align="right">
                                    <input type="number" name="recwidth" value="30" class="inlong">
                                </td>
                            </tr>
                            <tr class="box circle">
                                <td align="right">Radius (R)</td>
                                <td align="right">
                                    <input type="number" name="recredius" value="30" class="inlong">
                                </td>
                            </tr>
                            <tr class="box triangle">
                                <td align="right">Base (B)</td>
                                <td align="right">
                                    <input type="number" name="recbase" value="30" class="inlong">
                                </td>
                            </tr>
                            <tr class="box triangle">
                                <td align="right">ُساقه اول (S1)</td>
                                <td align="right">
                                    <input type="number" name="recs1" value="30" class="inlong">
                                </td>
                            </tr>
                            <tr class="box triangle">
                                <td align="right">ساقه دوم (S2)</td>
                                <td align="right">
                                    <input type="number" name="recs2" value="30" class="inlong">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center" style="padding:10px;">
                                    <input type="button" onclick="calculate(this);" calculate='perimeter' value="محیط" alt="محیط">
                                </td>
                                <td align="right" id="perimeter-value">مقدار محیط</td>

                            </tr>
                            <tr>
                                <td colspan="3" align="center" style="padding:10px;">
                                    <input type="button" onclick="calculate(this);" calculate='area' value="مساحت" alt="مساحت">
                                </td>
                                <td align="right" id="area-value">مقدار مساحت</td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
                $('#perimeter-value').html('محاسبه نشده')
                $('#area-value').html('محاسبه نشده')
            }).change();
        });

        function calculate(obj) {
            var width = $("input[name=recwidth]").val();
            var height = $("input[name=recheight]").val();
            var r = $("input[name=recredius]").val();
            var b = $("input[name=recbase]").val();
            var s1 = $("input[name=recs1]").val();
            var s2 = $("input[name=recs2]").val();
            var shape = $('#shape').val();
            var type = $(obj).attr('calculate');

            $.ajax({
                type: "POST",
                url: "./src/Controllers/calculate.php",
                data: {
                    w: width,
                    h: height,
                    r: r,
                    b: b,
                    s1: s1,
                    s2: s2,
                    type: type,
                    shape: shape,
                },
                dataType: "html",
                async: false,
                success: function(data) {
                    if (type == 'perimeter') {
                        $('#perimeter-value').html(data)
                    } else if (type == 'area') {
                        $('#area-value').html(data)
                    }
                }
            });

        }
    </script>

</body>

</html>