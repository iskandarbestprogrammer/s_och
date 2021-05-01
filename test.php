<html>
<head>
    <title>S.O. 4117106</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#selectOne').change(function() {
            var options = '<option value="0">-- select a model --</option>';

            if($(this).val() == '1') {
                options += '<option value="clio">clio</option>';
                options += '<option value="symbol">symbol</option>';
                options += '<option value="sandero">sandero</option>';
            } else if ($(this).val() == '2'){
                options += '<option value="Berlingo">Berlingo</option>';
                options += '<option value="C3">C3</option>';
                options += '<option value="C4">C4</option>';
            } 

            $('#selectTwo').html(options);
        });

        $('#frmPreselect').submit(function() {
            if ($('#selectOne').val() == '0' || $('#selectTwo').val() == '0') {
                alert('please select at least one brand and one model');
                return false; // don't submit
            }

            var action = '';

            if($('#selectOne').val() == '1') {
                action = 'ochJivbezreg.php';
            } else if ($('#selectOne').val() == '2'){
                action = 'ochJivSreg.php';
            }

            $(this).attr('action', action);
            return true; // submit
        });

        $('#selectOne').change();
    });
    </script>
    <style type="text/css">
        select, .bigSubmit {
            font-size: 16px; 
            font-family: Verdana, Geneva, sans-serif;
        }

        #selectOne {
            margin-right: 20px; 
        }

        .bigSubmit {
            font-size: 20px; 
            font-weight:bold;
        }

    </style>
</head>
<body>
    <form id="frmPreselect" name="frmPreselect" method="post" action="">
        <p>
            <select name="selectOne" id="selectOne">
                <option value="0">-- select a Brand --</option>
                <option value="1">Renault</option>
                <option value="2">Cïtroen</option>
            </select>

            <select name="selectTwo" id="selectTwo">
            </select>
        </p>
        <p>
            <input type="submit" value="SOLICITAR PRESUPUESTOS" class="bigSubmit" />
        </p>
    </form>
</body>
</html>