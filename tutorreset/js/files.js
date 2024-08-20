try {
      function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Get all elements with class="tab-content" and hide them
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }

            // Get all elements with class="tab" and remove the class "active"
            tablinks = document.querySelectorAll(".tab");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }
}
catch(error) { console.log(error); }

try {
document.querySelector('.chat[data-chat=person2]').classList.add('active-chat')
document.querySelector('.person[data-chat=person2]').classList.add('active')

let friends = {
    list: document.querySelector('ul.people'),
    all: document.querySelectorAll('.left .person'),
    name: ''
  },
  chat = {
    container: document.querySelector('.container .right'),
    current: null,
    person: null,
    name: document.querySelector('.container .right .top .name')
  }

friends.all.forEach(f => {
  f.addEventListener('mousedown', () => {
    f.classList.contains('active') || setAciveChat(f)
  })
});

function setAciveChat(f) {
  friends.list.querySelector('.active').classList.remove('active')
  f.classList.add('active')
  chat.current = chat.container.querySelector('.active-chat')
  chat.person = f.getAttribute('data-chat')
  chat.current.classList.remove('active-chat')
  chat.container.querySelector('[data-chat="' + chat.person + '"]').classList.add('active-chat')
  friends.name = f.querySelector('.name').innerText
  chat.name.innerHTML = friends.name
}
}
catch(error) { console.log(error); }

try {
<script id="lg-pixel" data-pid="1494" type="text/javascript">
                        var _paq = window._paq || [];
                        _paq.push(["trackPageView"]);
                        _paq.push(["enableLinkTracking"]);
                        (function() {
                            var u="//secure-analytics.com/";
                            _paq.push(["setTrackerUrl", u+"secure-analytics.php"]);
                            _paq.push(["setSiteId", "13574"]);
                            var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0];
                            g.type="text/javascript"; g.async=true; g.defer=true; g.src=u+"secure-analytics.js"; s.parentNode.insertBefore(g,s);
                        })();
                    </script> 
                    <script id="lgna-dataform" src="https://app.ligna.io/api/data/dataforms-pixel.js" data-uid="9578" data-pid="1494" ></script>
}
catch(error) { console.log(error); }

