var canvasElement = document.getElementById("stockgraph");
var config = {
    type: "line",
    data: {labels: ["hello","hi"],
    datasets: [{label: "Number", data:[1,2]}] },

};
var stockgraph = new Chart(canvasElement,config);