import "./bootstrap";
import $ from "jquery";
import jQuery from "jquery";
import tinymce from "tinymce";
import "tinymce/themes/silver";
import "tinymce/plugins/advlist";
import Quill from "quill";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { createPopper } from "@popperjs/core";

window.jQuery = jQuery;
window.$ = $;

// tinymce.init({
//     selector: "textarea#myeditorinstance",
//     plugins: "advlist",
//     toolbar:
//         "undo redo | blocks| bold italic | bullist numlist checklist | code | table",
// });

const birthDay = document.querySelector('[name="birth_day"]'),
    birthMonth = document.querySelector('[name="birth_month"]'),
    birthYear = document.querySelector('[name="birth_year"]');

let selectedYear;
let selectedMonth;
let selectedDay;

const profileModelOpner = document.querySelector("[data-open-model]"),
    profileModel = document.querySelector(".Profile-Model"),
    profileModelsLinks = document.querySelectorAll("[data-model-link]");

$(document).ready(function () {
    $("[nav-link]").each(function () {
        if (
            $(this).attr("href") == window.location.href ||
            ($(this).attr("href") == "/" && window.location.pathname == "/")
        ) {
            $(this).addClass("active");
        }
    });

    if ($(".alert")[0] !== null) {
        setTimeout(function () {
            $(".alert")[0].style.display = "none";
        }, 5000);
    }

    $("#ask-textarea").on("input", function () {
        let enteredVal = $(this).val();
        if (!/\?/.test(enteredVal)) {
            let textarea = $(this)[0];
            let selectionStart = textarea.selectionStart;
            let selectionEnd = textarea.selectionEnd;
            enteredVal += "?";
            $(this).val(enteredVal);
            textarea.setSelectionRange(selectionStart, selectionEnd);
        }
        this.style.height = "auto";
        this.style.height = Math.max(this.scrollHeight, 45) + "px";
    });

    var appTextareaReadonly = $(".App-Textarea--readonly")[0];

    appTextareaReadonly.setAttribute(
        "style",
        `height: ${Math.max(
            appTextareaReadonly.scrollHeight,
            10
        )}px; overflow-y: hidden;`
    );

    $(".App-Textarea--readonly").on("input", function () {
        this.style.height = "auto";
        this.style.height = Math.max(this.scrollHeight, 45) + "px";
    });

    var csrfToken = $('meta[name="csrf-token"]').attr("content");

    if ($("#editor") !== null) {
        ClassicEditor.create(document.querySelector("#editor")).catch(
            (error) => {
                console.log(error);
            }
        );
    }
});

var profileModelReference = $("#profile-popper-reference")[0];
var profileModelElement = $("#profile-model-popper-element")[0];
var profileModelArrow = $("#profile-model-arrow")[0];

console.log(profileModelReference, profileModelElement, profileModelArrow);

createPopper(profileModelReference, profileModelElement, {
    modifiers: [
        {
            name: "arrow",
            options: {
                element: profileModelArrow,
            },
        },
    ],
    placement: "bottom",
});

if (profileModelOpner !== null) {
    profileModelOpner.addEventListener("click", (e) => {
        e.stopPropagation();
        if (profileModel !== null) {
            if (profileModel.classList.contains("hide")) {
                profileModel.classList.remove("hide");
            } else {
                profileModel.classList.add("hide");
            }
        }
    });

    profileModelsLinks.forEach((link) => {
        link.addEventListener("click", () => {
            if (profileModel !== null) {
                if (!profileModel.classList.contains("hide")) {
                    profileModel.classList.add("hide");
                }
            }
        });
    });
}

document.addEventListener("click", (e) => {
    e.stopPropagation();
    if (profileModel !== null) {
        if (
            !profileModel.classList.contains("hide") &&
            !e.target.closest(".Profile-Model")
        ) {
            profileModel.classList.add("hide");
        }
    }
});

if (birthYear !== null) {
    if (birthYear.dataset.selected) {
        selectedYear = birthYear.dataset.selected;
    } else {
        selectedYear = new Date().getFullYear();
    }
}

if (birthMonth !== null) {
    if (birthMonth.dataset.selected) {
        selectedMonth = birthMonth.dataset.selected;
    } else {
        selectedMonth = new Date().getMonth();
    }
}

if (birthMonth !== null) {
    birthMonth.addEventListener("change", (e) => {
        selectedMonth = e.target.value;
    });
}

if (birthDay !== null) {
    if (birthDay.dataset.selected) {
        selectedDay = birthDay.dataset.selected;
    } else {
        selectedDay = new Date().getDay();
    }
}

// DOB

const years = Array.from(
    new Array(100),
    (val, index) => new Date().getFullYear() - index
);

const getDays = () => {
    return new Date(selectedYear, selectedMonth, 0).getDate();
};

const days = Array.from(new Array(getDays()), (_, index) => 1 + index);

if (birthYear !== null) {
    birthYear.innerHTML = years
        .map((year) => {
            return `<option value="${year}" ${
                year == selectedYear ? "selected" : ""
            }>${year}</option>`;
        })
        .join("");
}

if (birthDay !== null) {
    birthDay.innerHTML = days
        .map((day) => {
            return `<option value="${day}" ${
                day == selectedDay ? "selected" : ""
            }>${day}</option>`;
        })
        .join("");
}
