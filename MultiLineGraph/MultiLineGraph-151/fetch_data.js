 // $(document).ready(function () {
	
	
	
     // fetchDatabases(1);
	
   
 // });

 function fetchDatabases(boxNumber) {
        $.get('fetch_databases.php', function (data) {
            const databases = JSON.parse(data);
            if (databases.error) {
                alert('Error fetching databases: ' + databases.error);
                return;
            }

            // Populate the database dropdowns for both boxes
            databases.forEach(function (database) {
                $(`#database${boxNumber}`).append(new Option(database,database));
            });
        });
    }
	
function fetchTables(boxNumber) {
    const database = $(`#database${boxNumber}`).val();
    $.get(`fetch_tables.php?database=${database}`, function (data) {
        const tables = JSON.parse(data);
        $(`#table${boxNumber}`).empty().append(new Option('Select Table', ''));
        tables.forEach(function (table) {
            $(`#table${boxNumber}`).append(new Option(table, table));
        });
    });
}

function fetchColumnsAndStationIds(boxNumber) {
    const database = $(`#database${boxNumber}`).val();
    const table = $(`#table${boxNumber}`).val();

    $.get(`fetch_columns.php?database=${database}&table=${table}`, function (data) {
        const columns = JSON.parse(data);
        $(`#xaxis${boxNumber}, #yaxis${boxNumber}, #stationId${boxNumber}`).empty();
 $(`#stationId${boxNumber}`).empty().append(new Option('Select Station ID', ''));
        columns.forEach(function (column) {
            $(`#xaxis${boxNumber}`).append(new Option(column, column));
            $(`#yaxis${boxNumber}`).append(new Option(column, column));
			$(`#stationId${boxNumber}`).append(new Option(column, column));
            //if (column === 'station_id') {
                
            //}
        });
    });
	//fetchStationIds(boxNumber, database, table);
}

function fetchStationIds(boxNumber) {
	 const database = $(`#database${boxNumber}`).val();
    const table = $(`#table${boxNumber}`).val();
	const stationId = $(`#stationId${boxNumber}`).val();
    $.get(`fetch_station_ids.php?database=${database}&table=${table}&stationId=${stationId}`, function (data) {
        const stationIds = JSON.parse(data);
        $(`#stationsel${boxNumber}`).empty().append(new Option('Select Station ID', ''));
        stationIds.forEach(function (id) {
            $(`#stationsel${boxNumber}`).append(new Option(id, id));
        });
    });
}

function toggleFields(boxId,boxNumber,checkbox) {
    const box = document.getElementById(boxId);
    const dropdowns = box.querySelectorAll('select');
    
     dropdowns.forEach(dropdown => {
        dropdown.disabled = !checkbox.checked;
    });
	if(checkbox.checked){
		 //$(`#database${boxNumber}`).empty().append(new Option('Select database', '0'));
		 fetchDatabases(boxNumber);
	}
	else{
		  $(`#database${boxNumber}`).empty().append(new Option('Select database', '0'));
		   $(`#table${boxNumber}`).empty().append(new Option('Select table', '0'));
		   $(`#stationId${boxNumber}`).empty().append(new Option('Select Station ID', '0'));
		    $(`#xaxis${boxNumber}`).empty().append(new Option('Select X-Axis', '0'));
		    $(`#yaxis${boxNumber}`).empty().append(new Option('Select Y-axis', '0'));
			 $(`#stationsel${boxNumber}`).empty().append(new Option('Select Station Name', '0'));
			
			
	}
		
}


