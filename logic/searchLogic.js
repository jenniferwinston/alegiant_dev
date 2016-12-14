var jobsArr;
    // Testing
// var jobsArr = [{"id":10643,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1337609105203,"address":{"address1":"BLANK","city":"Las Palomas","state":"NM","zip":"87942","countryID":1},"employmentType":"Unknown","title":"OT","_score":1},{"id":10644,"clientCorporation":{"id":17572,"name":"Burger Rehabilitation Systems-Main"},"clientContact":{"id":31696,"firstName":"Generic","lastName":"Contact"},"dateAdded":1335373911620,"address":{"address1":"BLANK","city":"City of Industry/El Monte","state":"CA","zip":"90601","countryID":1},"employmentType":"Unknown","title":"OT","_score":1},{"id":10645,"clientCorporation":{"id":8016,"name":"Welsh Bello - Main"},"clientContact":{"id":24939,"firstName":"Generic","lastName":"Contact"},"dateAdded":1340972702610,"address":{"address1":"BLANK","city":"Elizabethton","state":"TN","zip":"37643","countryID":1},"employmentType":"Unknown","title":"SLP","_score":1},{"id":10646,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1317387717933,"address":{"address1":"BLANK","city":"Redding","state":"CA","zip":"96001","countryID":1},"employmentType":"Unknown","title":"OT or COTA","_score":1},{"id":10647,"clientCorporation":{"id":33382,"name":"RehabCare - Main"},"clientContact":{"id":1442,"firstName":"Vicki","lastName":"McCarthy"},"dateAdded":1433528334893,"address":{"address1":"BLANK","city":"Portsmouth","state":"OH","zip":null,"countryID":1},"employmentType":"Unknown","title":"Physical Therapist/ PT","_score":1},{"id":10648,"clientCorporation":{"id":8194,"name":"LaVie Rehab - Main"},"clientContact":{"id":38033,"firstName":"Generic","lastName":"Contact"},"dateAdded":1317219723440,"address":{"address1":"BLANK","city":"PERRY","state":"FL","zip":"32347","countryID":1},"employmentType":"Unknown","title":"PT","_score":1},{"id":10649,"clientCorporation":{"id":4749,"name":"Hallmark - Main"},"clientContact":{"id":3118,"firstName":"Generic","lastName":"Contact"},"dateAdded":1337704301557,"address":{"address1":"BLANK","city":"Liberty","state":"TX","zip":"77575","countryID":1},"employmentType":"Unknown","title":"PT","_score":1},{"id":10650,"clientCorporation":{"id":38949,"name":"Century Rehab - Main"},"clientContact":{"id":23043,"firstName":"Generic","lastName":"Contact"},"dateAdded":1311079736953,"address":{"address1":"BLANK","city":"Graham/Jackson","state":"TX","zip":"76450","countryID":1},"employmentType":"Unknown","title":"SLP","_score":1},{"id":10651,"clientCorporation":{"id":4749,"name":"Hallmark - Main"},"clientContact":{"id":3118,"firstName":"Generic","lastName":"Contact"},"dateAdded":1312375392910,"address":{"address1":"BLANK","city":"Azle","state":"TX","zip":"76020","countryID":1},"employmentType":"Unknown","title":"COTA or OT","_score":1},{"id":10652,"clientCorporation":{"id":32247,"name":"Burger Rehabilitation"},"clientContact":{"id":17627,"firstName":"Generic","lastName":"Contact"},"dateAdded":1463148823750,"address":{"address1":"BLANK","city":"Visalia","state":"CA","zip":null,"countryID":1},"employmentType":"Unknown","title":"Occupational Therapist","_score":1},{"id":10653,"clientCorporation":{"id":36339,"name":"ShiftWise-Main"},"clientContact":{"id":7678,"firstName":"Generic","lastName":"Contact"},"dateAdded":1334238597853,"address":{"address1":"BLANK","city":"Eufaula","state":"AL","zip":"19102","countryID":1},"employmentType":"Unknown","title":"OT or COTA","_score":1},{"id":10654,"clientCorporation":{"id":4749,"name":"Hallmark - Main"},"clientContact":{"id":3118,"firstName":"Generic","lastName":"Contact"},"dateAdded":1340113561837,"address":{"address1":null,"city":"Oakhurst","state":"CA","zip":"93644","countryID":1},"employmentType":"Contract","title":"PT or PTA","_score":1},{"id":10655,"clientCorporation":{"id":42337,"name":"MEMORIAL HOSPITAL OF SOUTH BEND"},"clientContact":{"id":39962,"firstName":"Generic","lastName":"Contact"},"dateAdded":1431980247810,"address":{"address1":"BLANK","city":"South Bend","state":"IN","zip":null,"countryID":1},"employmentType":"Unknown","title":"Med Surg/ Telemetry RN","_score":1},{"id":10656,"clientCorporation":{"id":21912,"name":"Genesis - Main"},"clientContact":{"id":34041,"firstName":"Generic","lastName":"Contact"},"dateAdded":1340283357667,"address":{"address1":"BLANK","city":"Ayer","state":"MA","zip":"01432","countryID":1},"employmentType":"Unknown","title":"PT","_score":1},{"id":10657,"clientCorporation":{"id":11968,"name":"AMN Healthcare-Main"},"clientContact":{"id":1444,"firstName":"Jonathan","lastName":"Murphy"},"dateAdded":1374280299000,"address":{"address1":"BLANK","city":"Washington","state":"DC","zip":null,"countryID":1},"employmentType":"Unknown","title":"PTA","_score":1},{"id":10658,"clientCorporation":{"id":26723,"name":"Synertx Rehab - Main"},"clientContact":{"id":1329,"firstName":"Erika","lastName":"Brachfeld"},"dateAdded":1310841746553,"address":{"address1":"BLANK","city":"Truth/ Consequences","state":"NM","zip":"87901","countryID":1},"employmentType":"Unknown","title":"PT","_score":1},{"id":10659,"clientCorporation":{"id":6031,"name":"CONSULATE HEALTH CARE OF ORANGE PARK"},"clientContact":{"id":20087,"firstName":"Generic","lastName":"Contact"},"dateAdded":1470940835427,"address":{"address1":"BLANK","city":"Orange Park","state":"FL","zip":null,"countryID":1},"employmentType":"Unknown","title":"Speech Language Pathologist/ SLP","_score":1},{"id":10660,"clientCorporation":{"id":557,"name":"ST VINCENT HOSPITAL"},"clientContact":{"id":15286,"firstName":"Generic","lastName":"Contact"},"dateAdded":1471979466790,"address":{"address1":"BLANK","city":"Green Bay","state":"WI","zip":null,"countryID":1},"employmentType":"Unknown","title":"Operating Room Nurse/ OR RN","_score":1},{"id":10661,"clientCorporation":{"id":28679,"name":"Guardian Rehab - Main"},"clientContact":{"id":3487,"firstName":"Generic","lastName":"Contact"},"dateAdded":1322598122067,"address":{"address1":"BLANK","city":"Forksville/Laporte","state":"PA","zip":"18616/18626","countryID":1},"employmentType":"Unknown","title":"PT","_score":1},{"id":10662,"clientCorporation":{"id":21912,"name":"Genesis - Main"},"clientContact":{"id":34041,"firstName":"Generic","lastName":"Contact"},"dateAdded":1404824546753,"address":{"address1":"BLANK","city":"Harrisburg","state":"PA","zip":null,"countryID":1},"employmentType":"Unknown","title":"Occupational Therapist / OT","_score":1}];
// On load will show thirty most recent listings

$('#findButton').on('click', function(event){
    event.preventDefault();
    var searchLocation = $('#searchLocation').val();
    var searchKeywords = $('#searchKeywords').val();
    var url = "search.php?keywords=" + searchKeywords + "&location=" + searchLocation;
    // alert("Clicked: "+ url);

    $.ajax({
        url: "search.php?keywords=" + searchKeywords + "&location=" + searchLocation,
        dataType: 'json'
    }).done(function(response){
        // console.log(response);
        var jobsArr = response;
        var freshness;
        $(".jobListings").html("");
        for (i = 0; i < jobsArr.length; i++){
            var listingDate = "/Date("+jobsArr[i].dateAdded+")/";
            var daysOld = (moment(listingDate).diff(moment(), "days") * -1);
            if (daysOld == 0) {
                freshness = "Added today";
            } else if (daysOld == 1) {
                freshness = "Added yesterday";
            } else {
                freshness = daysOld + " days old";
            }
            /*console.log(jobsArr[i]);*/
            $(".jobListings").append(
                "<li class='allJobListings' id='job" + i + "' data-id='" + i + "'>" +
                "<a href=''>" +
                "<div class='jobWrapper'>" +
                "<div class='position'>" + jobsArr[i].title + "</div>" +
                "<div class='location'>" + jobsArr[i].city + "<br> " + jobsArr[i].state + "</div>" +
                "<div class='jobListInfo'>"+ freshness +"</div>" +
                "</div>" +
                "</a>" +
                "</li>");
        }
    });

});

$.ajax({
    url: "jobs.php",
    dataType: 'json'
}).done(function(response){
    // console.log(response);
    var jobsArr = response;
    var freshness;
    for (i = 0; i < jobsArr.length; i++){
        var listingDate = "/Date("+jobsArr[i].dateAdded+")/";
        var daysOld = (moment(listingDate).diff(moment(), "days") * -1);
        if (daysOld == 0) {
            freshness = "Added today";
        } else if (daysOld == 1) {
            freshness = "Added yesterday";
        } else {
            freshness = daysOld + " days old";
        }
        /*console.log(jobsArr[i]);*/
        $(".jobListings").append(
            "<li class='allJobListings' id='job" + i + "' data-id='" + i + "'>" +
            "<a href=''>" +
            "<div class='jobWrapper'>" +
            "<div class='position'>" + jobsArr[i].title + "</div>" +
            "<div class='location'>" + jobsArr[i].city + "<br> " + jobsArr[i].state + "</div>" +
            "<div class='jobListInfo'>"+ freshness +"</div>" +
            "</div>" +
            "</a>" +
            "</li>");
    }
});



$(".jobListingDiv").append("<div class='loadMoreJobs'>Load more jobs<i class='fa fa-caret-down' aria-hidden='true'></i></div>");

$('#aboutBtn, #newsBtn, #jobSearchBtn, #contactBtn').hover(
	function(){
		$(this).css("borderRadius", "7px 7px 7px 7px");
		$(this).css("backgroundColor", "#e3e4e6");
	}, function(){
		$(this).css("backgroundColor", "#f9f9f9");
	}
);

$("#jobSeekersBtn, #jobSeekDropdown").hover(
	function(){
		$("#jobSeekDropdown").css("display", "block");
		$("#jobSeekersBtn").css("borderRadius", "7px 7px 7px 7px");
		$("#jobSeekersBtn").css("backgroundColor", "#e3e4e6");
	}, function(){
		$("#jobSeekDropdown").css("display", "none");
		$("#jobSeekersBtn").css("backgroundColor", "#f9f9f9");
	}
);

$(".allJobListings").hover(function(){
    	var jobNum = $(this).data("id");
    	$("#job" + jobNum).css("backgroundColor", "#f9f9f9");
    }, function(){
    	var jobNum = $(this).data("id");
    	$("#job" + jobNum).css("backgroundColor", "white");
});

$(".loadMoreJobs").hover(function(){
    	$(".loadMoreJobs").css("backgroundColor", "#f9f9f9");
    }, function(){
    	$(".loadMoreJobs").css("backgroundColor", "white");
});