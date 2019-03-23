var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
//Using Classes and Constructors and Render to Create Main Div Content Section where All Content will sit.
//Setting up the heading and idtags that I need for the adding of the data later.
var contentDivs = /** @class */ (function () {
    function contentDivs(headings, idTags) {
        this.headings = headings;
        this.idTags = idTags;
    }
    contentDivs.prototype.render = function () {
        return document.querySelector("#contentsection").innerHTML +=
            "<div class='row'><div class='col-lg-12 content1' id='" + this.idTags + "'><a name='" + this.idTags + "'><h2>" + this.headings + "</h2></div></div></a><div class='col-lg-12' id='toparrow'><a href='index.html'><span class='glyphicon glyphicon-arrow-up'></span> Top</a></div>";
    };
    ;
    return contentDivs;
}());
;
var contentSetUp = []; //Storing and creating the array for the content creation section.
contentSetUp.push(new contentDivs("<span id='s1'>Top</span> Sights", "sights")); //Added span so that I can style the one word TOP. 
contentSetUp.push(new contentDivs("<span id='s1'>Top</span> Restaurants", "eatery")); //Added span so that I can style the one word TOP.
contentSetUp.push(new contentDivs("<span id='s1'>Top</span> Events", "events")); //Added span so that I can style the one word TOP.
for (var csu in contentSetUp) {
    contentSetUp[csu].render(); //Used to render and print the details to the html output above on the render function. 
}
//Using Classes and Constructors and Render to Create Now The ACTUAL Content.
var hotspot = /** @class */ (function () {
    function hotspot(image, name, street, city, postCode, telephone, date) {
        this.image = image;
        this.name = name;
        this.street = street;
        this.city = city;
        this.postCode = postCode;
        this.telephone = telephone;
        this.date = date;
    }
    ;
    return hotspot;
}());
;
var sights = /** @class */ (function (_super) {
    __extends(sights, _super);
    function sights(img, name, street, city, postCode, telephone, date, metro, openTimes, entryCost) {
        var _this = _super.call(this, img, name, street, city, postCode, telephone, date) || this;
        _this.metro = metro;
        _this.openTimes = openTimes;
        _this.entryCost = entryCost;
        return _this;
    }
    ;
    sights.prototype.render = function () {
        return document.querySelector("#sights").innerHTML +=
            "<div class='col-lg-3 col-md-6 col-sd-12' id='dataset'><div class='travelcard'><img class='travelcard-img-top'src='" + this.image + "'alt='TravelCard image cap'><div class='travelcard-body'><h3 class='travelcard-title'>" + this.name + "</h3>\n <p class='travelcard-text'><span>Address:</span> " + this.street + ", " + this.city + ", " + this.postCode + "</p><p class='travelcard-text'><span>Tel:</span> " + this.telephone + "</p><p class='travelcard-text'><span>Metro:</span> " + this.metro + "</p><p class='travelcard-text'><span>Opening Times:</span> " + this.openTimes + "</p><p class='travelcard-text'><span>Entry Cost:</span> " + this.entryCost + "</p><p class='font-italic text-secondary'>Created: " + this.date + "</p></div></div></div";
    };
    ;
    return sights;
}(hotspot));
;
var eatery = /** @class */ (function (_super) {
    __extends(eatery, _super);
    function eatery(img, name, street, city, postCode, telephone, date, type, value, webAddress) {
        var _this = _super.call(this, img, name, street, city, postCode, telephone, date) || this;
        _this.type = type;
        _this.value = value;
        _this.webAddress = webAddress;
        return _this;
    }
    ;
    eatery.prototype.render = function () {
        return document.querySelector("#eatery").innerHTML +=
            "<div class='col-lg-3 col-md-6 col-sd-12 id='dataset'><div class='travelcard'><img class='travelcard-img-top'src='" + this.image + "'alt='TravelCard image cap'><div class='travelcard-body'><h3 class='travelcard-title'>" + this.name + "</h3>\n <p class='travelcard-text'><span>Address:</span> " + this.street + ", " + this.city + ", " + this.postCode + "</p><p class='travelcard-text'><span>Tel:</span> " + this.telephone + "</p><p class='travelcard-text'><span>Style:</span> " + this.type + "</p><p class='travelcard-text'><span>Value:</span> " + this.value + "</p><p class='travelcard-text'><span>Web:</span> <a href='" + this.webAddress + "'>" + this.webAddress + "</p></a><p class='font-italic text-secondary'>Created: " + this.date + "</p></div></div></div";
    };
    ;
    return eatery;
}(hotspot));
;
var events = /** @class */ (function (_super) {
    __extends(events, _super);
    function events(img, name, street, city, postCode, telephone, date, eventPlace, eventDate, eventTime, ticketPrice) {
        var _this = _super.call(this, img, name, street, city, postCode, telephone, date) || this;
        _this.eventPlace = eventPlace;
        _this.eventDate = eventDate;
        _this.eventTime = eventTime;
        _this.ticketPrice = ticketPrice;
        return _this;
    }
    ;
    events.prototype.render = function () {
        return document.querySelector("#events").innerHTML +=
            "<div class='col-lg-3 col-md-6 col-sd-12' id='dataset'><div class='travelcard'><img class='travelcard-img-top'src='" + this.image + "'alt='TravelCard image cap'><div class='travelcard-body'><h3 class='travelcard-title'>" + this.name + "</h3>\n <p class='travelcard-text'><span>Location:</span> " + this.eventPlace + "</p><p class='travelcard-text'><span>Address:</span> " + this.street + ", " + this.city + ", " + this.postCode + "</p><p class='travelcard-text'><span>Tel:</span> " + this.telephone + "</p><p class='travelcard-text'><span>Date:</span> " + this.eventDate + "</p><p class='travelcard-text'><span>Showings:</span> " + this.eventTime + "</p><p class='travelcard-text'><span>Price:</span> " + this.ticketPrice + "</p><p class='font-italic text-secondary'>Created: " + this.date + "</p></div></div></div";
    };
    ;
    return events;
}(hotspot));
;
var locationDetails = []; //Store all objects into this location. 
//Details on hotspots for Sightseeing
locationDetails.push(new sights("./IMG/0.jpg", "The Hermitage (The Winter Palace)", "2, Dvortsovaya Ploschad", "St. Petersburg", "190000", "+7 (812) 571-3420", "24.05.2018 12:45", "Admiralteyskaya", "Daily 10:30am to 6pm. Last admission is at 5:30pm. Wednesday and Friday, till 9pm. Last admission is at 8:30pm", "600 Rbl"));
locationDetails.push(new sights("./IMG/1.jpg", "The Mariinsky Theatre", "1, Teatralnaya Ploshchad", "St. Petersburg", "190000", "+7 (812) 326-4141", "24.06.2018 10:00", "Admiralteyskaya, Sadovaya / Sennaya Ploshchad / Spasskaya", "Daily 5pm to 12pm", "50 Rbl"));
locationDetails.push(new sights("./IMG/st-isaacs-cathedral-in-st-petersburg.jpg", "St. Isaac's Cathedral & Colonnade", "4, Isaakievskaya Square", "St. Petersburg", "190000", "+7 (812) 315-9732", "05.010.2018 09:00", "Admiralteyskaya", "Daily 10.30 am to 6 pm. Last admission is at 5.30 pm. Night openings of the Colonnade in the White Nights only (June 1 - August 20): 10.30 pm to 4.30 am.", "Adult: 250 Rbl, Child: 50 Rbl"));
locationDetails.push(new sights("./IMG/peterpaulfortress.jpg", "The Peter & Paul Fortress", "Zayachy (Hare) Island", "St. Petersburg", "190000", "+7 (812) 326-4141", "04.09.2018 17:00", "Gorkovskaya / Sportivnaya", "The grounds of the fortress at open 6am to 10pm. All exhibitions are open daily, except Wednesdays, 10 am to 6 pm. Last admission is at 5 pm. Tuesdays, 10 am to 5 pm. Last admission is at 4 pm.", "350 Rbl"));
//Details on hotspots for Eateries
locationDetails.push(new eatery("./IMG/2.jpg", "TSAR", "12, Sadovaya Street", "St. Petersburg", "190000", "+7 (812) 640-1616", "01.01.2019 16:00", "European, Russian, Vegetarian Friendly", "€€€€", "http://en.ginza.ru/spb/restaurant/tsar"));
locationDetails.push(new eatery("./IMG/3.jpg", "Palkin", "47, Nevskiy Avenue", "St. Petersburg", "191025", "+7 (812) 703-5371", "12.12.2018 15:00", "European, Russian, Vegetarian Friendly", "€€€€", "www.palkin.ru"));
locationDetails.push(new eatery("./IMG/flakerscafe.jpg", "Flakers Cafe", "10, Naberezhnaya reki Karpovki", "St. Petersburg", "197022", "+7 (921) 644-0664", "25.08.2018 20:00", "Cafe, European, Vegetarian Friendly", "€", "www.facebook.com/flakerscafe/?"));
locationDetails.push(new eatery("./IMG/cafebarbonch.jpg", "Cafe Bar Bonch", "16, Bolshaya Morskaya St.", "St. Petersburg", "191186", "+7 (812) 703-5371", "05.03.2018 23:00", "European, Russian, Vegetarian Friendly", "€€-€€€", "www.facebook.com/bonchcoffebar?"));
//Details on hotspots for Events
locationDetails.push(new events("./IMG/4.jpg", "Bel Suono", "6, Ligovsky Pr", "St. Petersburg", "190000", "(+7) (812) 275-1300", "05.02.2019 10:00", "Oktyabrsky Grand Concert Hall (BKZ)", "7 April 2019", "19:00 MSK", "1,300 - 5,000 Rbl"));
locationDetails.push(new events("./IMG/5.jpg", "Eugene Onegin", "1, Teatralnaya Pl", "St. Petersburg", "190000", "+7 (812) 326-4141", "05.02.2019 10:00", "Mariinsky Theatre", "11 April 2019", "19:00 MSK", "2,800 - 5,000Rbl"));
locationDetails.push(new events("./IMG/balletathotel.jpg", "Tchaikovsky Nights", "1/7, Mikhailovskaya Ul.", "St. Petersburg", "191186", " +7 (812) 329-6622  ", "05.02.2019 10:00", "L’Europe Restaurant, Belmond Grand Hotel Europe", "Every Friday", "19:00 MSK", "N/A"));
locationDetails.push(new events("./IMG/hamletrussian.jpg", "Russian Hamlet", "2, Pl. Ostrovskogo", "St. Petersburg", "191011", "+7 (812) 312-1545 ", "05.02.2019 10:00", "Alexandrinsky Theatre", "1-2 April 2019", "20:00 MSK", "1,000 - 7,000 Rbl"));
for (var index in locationDetails) {
    locationDetails[index].render(); //Used to render and print the details to the html output above on the render function. 
}
