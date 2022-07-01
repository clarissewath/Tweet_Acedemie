"use strict";
window.addEventListener("load", function () {
    $("#replies").hide();
    $("#media-twt").hide();
    $("#liked-twt").hide();
    $("#all-twt").click(function () {
        $("#all-twt").attr("attr", "active");
        $("#twt-replies").removeAttr("attr");
        $("#twt-media").removeAttr("attr");
        $("#likes").removeAttr("attr");
        $("#all-tweets").show();
        $("#replies").hide();
        $("#media-twt").hide();
        $("#liked-twt").hide();
    });
    $("#twt-replies").click(function () {
        $("#twt-replies").attr("attr", "active");
        $("#all-twt").removeAttr("attr");
        $("#twt-media").removeAttr("attr");
        $("#likes").removeAttr("attr");
        $("#replies").show();
        $("#all-tweets").hide();
        $("#media-twt").hide();
        $("#liked-twt").hide();
    });
    $("#twt-media").click(function () {
        $("#twt-media").attr("attr", "active");
        $("#all-twt").removeAttr("attr");
        $("#twt-replies").removeAttr("attr");
        $("#likes").removeAttr("attr");
        $("#media-twt").show();
        $("#all-tweets").hide();
        $("#replies").hide();
        $("#liked-twt").hide();
    });
    $("#likes").click(function () {
        $("#likes").attr("attr", "active");
        $("#all-twt").removeAttr("attr");
        $("#twt-replies").removeAttr("attr");
        $("#twt-media").removeAttr("attr");
        $("#liked-twt").show();
        $("#all-tweets").hide();
        $("#replies").hide();
        $("#media-twt").hide();
    });

    var exampleModal = document.getElementById("exampleModal");
    exampleModal?.addEventListener("show.bs.modal", function (event) {
        //  console.log(event);
        var button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute("data-bs-whatever");

        var btnSendReply = document.getElementById("sendReply");

        var modalTitle = exampleModal.querySelector(".modal-title");
        var modalBodyInput = exampleModal.querySelector(".modal-body input");

        modalTitle.textContent = "Respond to " + recipient;
        modalBodyInput.value = recipient;
        function sendReply() {
            let tweet_id_reply = button.parentNode.nextSibling.lastChild.value;

            var message_text =
                exampleModal.querySelector("#message-text").value;

            let formData;
            let message_content = message_text;
            formData = new FormData();
            //     console.warn(formData);
            formData.append("message_content", message_content);
            formData.append("recipient", recipient);
            formData.append("tweet_id_reply", tweet_id_reply);
            message_content = new Request(
                "../app/Controllers/ReplyController.php",
                {
                    method: "POST",
                    body: formData,
                    headers: new Headers({}),
                }
            );

            fetch(message_content)
                // window.location.reload(true);
                .then((response) => console.warn(response))
                .catch((error) => console.error(error));
            // .then(function () {})
        }
        btnSendReply.addEventListener("click", sendReply);

        // document.querySelectorAll(".tweet_retweet").forEach(function (currentBtn) {
        // currentBtn.addEventListener("click", sendReply);
        // });
    });

    document.querySelectorAll(".modal_test").forEach(function (a) {
        a.addEventListener("click", function () {
            // alert("yes !");
        });
    });

    function clicked() {
        document.querySelectorAll("[password-toggle]").forEach(function (a) {
            switch (a.attributes.type.value) {
                case "password":
                    a.setAttribute("type", "text");
                    break;
                case "text":
                    a.setAttribute("type", "password");
            }
        });
    }
    document.querySelectorAll(".toggleVisibility")?.forEach(function (a) {
        a.addEventListener("click", clicked);
    });

    let signupCountChar = document.getElementById("signupCountChar");

    signupCountChar?.addEventListener("keyup", function () {
        let char = document.getElementById("char");
        char.innerHTML = " ";
        let countedChar = this.value.length;
        char.innerHTML += countedChar + " / 50";
    });
    // let middle_column = this.document.getElementById("middle_column");
    let head_textarea = document.getElementById("head_textarea");

    const maxLength = 140;
    let count = document.getElementById("count");
    if (count) {
        count.style.display = "none";
    }
    let visibility = document.getElementById("visibility");
    // middle_column?.addEventListener("mouseleave", function () {
    // visibility.style.display = "none";
    // });
    function watchTyping(a) {
        // console.warn(a);
        let v;
        let b = [];
        b.push(a);
        const sharpSign = ["#"];
        const atSign = ["@"];

        if (sharpSign.some((v) => a.includes(v))) {
            console.warn(`Sharp found !`);
        } else {
            // console.warn(`No match `);
        }

        if (atSign.some((v) => a.includes(v))) {
            console.warn(`At found !`);
        } else {
            // console.warn(`No match `);
        }
        // console.warn(
        // a
        // .replace(/(http:\/\/([^\s]+))/g, '<a href="$1" target="_blank">$1</a>')
        // .replace(
        // /@([A-Za-z0-9_-]+)/g,
        // '<a href="https://twitter.com/$1" target="_blank">@$1</a>'
        // )
        // .replace(
        // /#([A-Za-z0-9_-]+)/g,
        // '<a href="https://twitter.com/search?q=%23$1" target="_blank">#$1</a>'
        // )
        // );
    }
    head_textarea?.addEventListener("keyup", function () {
        let input_twt_btn = document.getElementById("input-twt-btn");

        visibility.style.display = "block";

        input_twt_btn.style.pointerEvents = "auto";
        input_twt_btn.style.backgroundColor = "#d24743";
        input_twt_btn.style.color = "#fff";

        count.style.display = "block";
        var getTextCount = this.value;

        watchTyping(this.value);

        var charCount = maxLength - getTextCount.length;

        if (getTextCount.length <= maxLength) {
            let count = document.getElementById("count");

            count.innerHTML = charCount;
            count.style.color = "#fff";
        } else {
            count.innerHTML = maxLength - getTextCount.length;
            count.style.color = "orange";
            let input_twt_btn = document.getElementById("input-twt-btn");
            input_twt_btn.style.pointerEvents = "none";
            input_twt_btn.style.backgroundColor = "#d24843b9";
            input_twt_btn.style.color = "#e9e8e8ae";
        }
    });
});

function retweet() {
    let formData,
        tweet_id = this.nextSibling.value ?? -1;
    formData = new FormData();
    formData.append("retweet_id", tweet_id);
    tweet_id = new Request("../app/Controllers/Received_tweets.php", {
        method: "POST",
        body: formData,
        headers: new Headers({}),
    });
    fetch(tweet_id).then((response) => console.warn(response));
    // .then(function () {})
    // .then((data) => console.log(data));
}
document.querySelectorAll(".tweet_retweet").forEach(function (currentBtn) {
    currentBtn.addEventListener("click", retweet);
});
let what_s_happenning = document.getElementById("post_form");

let send_messages_form = document.getElementById("send_messages_form");
send_messages_form?.addEventListener("submit", function (e) {
    e.preventDefault();
    let formData;
    //    console.warn(this);
    let textareat_content = document.getElementById("textareat_content").value;
    let recipient_username =
        document.getElementById("recipient_username").value;
    let id_sender = document.getElementById("id_sender").value;
    //   console.warn(id_sender);
    formData = new FormData();
    formData.append("id_sender", id_sender);
    formData.append("message_content", textareat_content);
    formData.append("recipient_username", recipient_username);
    let sendMessage = new Request("../app/Controllers/MessageControl.php", {
        method: "POST",
        body: formData,
        headers: new Headers({}),
    });
    fetch(sendMessage).then((response) => console.warn(response));
    document.getElementById("send_messages_form").reset();
    // .then(function () {})
    // .then((data) => console.log(data));
});

let EditProfile_form = document.getElementById("EditProfile_form");
EditProfile_form?.addEventListener("submit", function (e) {
    e.preventDefault();
    let formData;
    //    console.warn(this);
    let changeName = document.getElementById("changeName").value;
    let changeEmail = document.getElementById("changeEmail").value;
    let changePwd = document.getElementById("changePwd").value;
    formData = new FormData();
    formData.append("changeName", changeName);
    formData.append("changePwd", changePwd);
    formData.append("changeEmail", changeEmail);
    let sendMessage = new Request("../app/Controllers/EditProfile.php", {
        method: "POST",
        body: formData,
        headers: new Headers({}),
    });
    fetch(sendMessage).then((response) => console.warn(response));
    document.getElementById("EditProfile_form").reset();

    // .then(function () {})
    // .then((data) => console.log(data));
});

what_s_happenning?.addEventListener("submit", function (e) {
    e.preventDefault();
    !(function (data) {
        let hashTag = data[0].value
            .replace(
                /(http:\/\/([^\s]+))/g,
                '<a href="$1" target="_blank">$1</a>'
            )
            .replace(
                /@([A-Za-z0-9_-]+)/g,
                '<a href="https://twitter.com/$1" target="_blank">@$1</a>'
            )
            .replace(
                /#([A-Za-z0-9_-]+)/g,
                '<a href="https://twitter.com/search?q=%23$1" target="_blank">#$1</a>'
            );
        data[0].value = hashTag;

        const XHR = new XMLHttpRequest();
        data = new FormData(data);
        XHR.addEventListener("load", function (e) {
            console.warn(e.target.responseText);
        });
        XHR.addEventListener("error", function () {
            console.warn("Oups! Quelque chose s'est mal pass\u00e9.");
        });
        XHR.open("POST", "../app/Controllers/Received_tweets.php");
        XHR.send(data);
        document.getElementById("post_form").reset();
        // console.warn(data);
    })(what_s_happenning);
});
