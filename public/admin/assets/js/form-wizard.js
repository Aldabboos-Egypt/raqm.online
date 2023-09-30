// 1. horizontal wizard
"use strict";
var currentTab = 0;
showTab(currentTab);
function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n == 0) {
        document.getElementById("prevbtn").style.display = "none";
    } else {
        document.getElementById("prevbtn").style.display = "inline";
    }
    if (n == x.length - 1) {
        document.getElementById("nextbtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextbtn").innerHTML = "Next";
    }
    fixStepIndicator(n);
}
function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("regForm").submit();
        return false;
    }
    showTab(currentTab);
}
function validateForm() {
    var x,
        y,
        i,
        valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
}
function fixStepIndicator(n) {
    var i,
        x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}

// 2. Numbering wizard
var form = document.getElementById("msform");
var fieldsets = form.getElementsByClassName("form");
var currentStep = 0;
var numSteps = 5;

for (var i = 1; i < fieldsets.length; i++) {
    fieldsets[i].style.display = "none";
}

/**
 * Validate the inputs on the current step if required
 * @param {String} step like one, two, three
 * @return {Boolean}
 */
function validateCurrentStep(step) {
    let invalid = false;
    $(`#msform .stepper-${step} input[required], #msform .stepper-${step} textarea[required]`).each(function () {
        if ($(this).val() == "") {
            // show alert if logo or cover is empty
            // if ($(this).attr("name") == "logo" || $(this).attr("name") == "cover") {
            //     alert($(this).attr("name") + " " + trans.required);
            // }
            $(this).addClass("invalid");
            invalid = true;
        }
    });
    if (invalid) {
        return false;
    }
    return true;
}

function nextStep() {

    // switch (currentStep) {
    //     case 0:
    //         if (!validateCurrentStep('one')) return false;
    //         break;
    //     case 1:
    //         if (!validateCurrentStep('two')) return false;
    //         break;
    //     case 2:
    //         if (!validateCurrentStep('three')) return false;
    //         break;
    //     case 3:
    //         if (!validateCurrentStep('four')) return false;
    //         break;
    // }

    document.getElementById("prevbtn").style.display = "block";
    document.getElementById("prevbtn").disabled = false;

    currentStep++;
    if (currentStep > numSteps) {
        currentStep = 1;
    }
    var stepper = document.getElementById("stepper1");
    var steps = stepper.getElementsByClassName("step");

    Array.from(steps).forEach((step, index) => {
        let stepNum = index + 1;
        let stepLength = steps.length;

        if (stepNum === currentStep && currentStep < stepLength) {
            addClass(step, "editing");
            fieldsets[currentStep].style.display = "flex";
        } else {
            removeClass(step, "editing");
        }
        if (stepNum <= currentStep && currentStep < stepLength) {
            // if(! validateCurrentStep('two')) return false;
            addClass(step, "done");
            addClass(step, "active");
            removeClass(step, "editing");
            fieldsets[currentStep - 1].style.display = "none";
        } else {
            removeClass(step, "done");
        }
        if (currentStep == stepLength - 1) {
            document.getElementById("nextbtn").textContent = "Finish";
        }
        if (currentStep > stepLength - 1) {
            document.getElementById("nextbtn").textContent = "Finish";
            addClass(step, "done");
            addClass(step, "active");
            document.getElementById("msform").submit();
            removeClass(step, "editing");
            document.getElementById("nextbtn").disabled = true;
        }
    });
}

function backStep() {
    currentStep--;
    var stepper = document.getElementById("stepper1");
    var steps = stepper.getElementsByClassName("step");

    let stepLength = steps.length;
    document.getElementById("nextbtn").textContent = "Next";
    document.getElementById("nextbtn").disabled = false;
    if (currentStep < stepLength - 1) {
        document.getElementById("prevbtn").disabled = false;
        fieldsets[currentStep + 1].style.display = "none";
        fieldsets[currentStep].style.display = "flex";
        removeClass(steps[currentStep], "done");
        removeClass(steps[currentStep], "active");
        if (currentStep == 0) {
            document.getElementById("prevbtn").disabled = true;
        }
    } else {
        removeClass(steps[currentStep], "done");
        removeClass(steps[currentStep], "active");
    }
}

// function prevStep(){
//   fieldsets[currentStep].style.display = "none";
//   currentStep--;
//   fieldsets[currentStep].style.display = "block";
// }

/* get, set class, see https://ultimatecourses.com/blog/javascript-hasclass-addclass-removeclass-toggleclass */

function hasClass(elem, className) {
    return new RegExp(" " + className + " ").test(" " + elem.className + " ");
}

function addClass(elem, className) {
    if (!hasClass(elem, className)) {
        elem.className += " " + className;
    }
}

function removeClass(elem, className) {
    console.log("elem, className", elem, className);
    var newClass = " " + elem.className.replace(/[\t\r\n]/g, " ") + " ";
    if (hasClass(elem, className)) {
        while (newClass.indexOf(" " + className + " ") >= 0) {
            newClass = newClass.replace(" " + className + " ", " ");
        }
        elem.className = newClass.replace(/^\s+|\s+$/g, "");
    }
    console.log("elem.className", elem.className);
}
