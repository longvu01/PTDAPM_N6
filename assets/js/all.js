/* add background gradient */
const titleInfos = document.querySelectorAll.bind(document)(
  '.showrooms__info .info__location'
);

titleInfos.forEach((titleInfo) => {
  titleInfo.onclick = function () {
    document.querySelector
      .bind(document)('.info__location.info__location--active')
      .classList.remove('info__location--active');
    // console.log(this);
    this.classList.add('info__location--active');
  };
});
/* add page-item active */
const pages = document.querySelectorAll.bind(document)('.page-item');

pages.forEach((page) => {
  page.onclick = function () {
    document.querySelector
      .bind(document)('.page-item.active')
      .classList.remove('active');
    // console.log(this);
    this.classList.add('active');
  };
});

/* add cate-choice active */
const cate_choices = document.querySelectorAll.bind(document)(
  '.category-box-choice'
);

cate_choices.forEach((cate_choice) => {
  cate_choice.onclick = function () {
    if (
      document.querySelector.bind(document)(
        '.category-box-choice.choice-active'
      )
    ) {
      document.querySelector
        .bind(document)('.category-box-choice.choice-active')
        .classList.remove('choice-active');
    }
    // console.log(this);
    this.classList.add('choice-active');
  };
});

/* scroll */
const body = document.querySelector.bind(document)('body');
const wrapper = document.querySelector.bind(document)('.wrapper');
const header = document.querySelector.bind(document)('.header');
const headerTop = document.querySelector.bind(document)('.header__top');
const headerLogo = document.querySelector.bind(document)('.header-logo');
const u_a_i_first = document.querySelector.bind(document)(
  '.user-action-item--first'
);
const selectionScroll =
  document.querySelector.bind(document)('.selection-scroll');
const uaList = document.querySelector.bind(document)('.user-action-list');
const sellLinks = document.querySelectorAll.bind(document)('.sell__link');
const selections = document.querySelectorAll.bind(document)('.selection');
const newsInfo = document.querySelectorAll.bind(document)('.news__info');
const buildPCs = document.querySelectorAll.bind(document)('.build-pcs');

const scrollToTopBtn = document.querySelector.bind(document)('#btn_scroll-top');
var rootElement = document.documentElement;
scrollToTopBtn.onclick = function () {
  rootElement.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
};
document.onscroll = function () {
  const scrollTop = window.scrollY || document.documentElement.scrollTop;
  // console.log(scrollTop);

  if (scrollTop > 800) {
    body.style.margin = '200px 0 0 0';
    header.style.position = 'fixed';
    wrapper.style.display = 'flex';
    wrapper.style.flexDirection = 'row-reverse';
    headerTop.classList.add('hide');
    headerLogo.classList.add('hide');
    u_a_i_first.classList.add('hide');
    uaList.style.padding = '0px';
    sellLinks.forEach((sellLink) => {
      sellLink.classList.add('hide');
    });
    selections.forEach((selection) => {
      selection.classList.add('hide');
    });
    newsInfo.forEach((item) => {
      item.classList.add('hide');
    });
    buildPCs.forEach((buildPC) => {
      buildPC.classList.add('hide');
    });
    selectionScroll.classList.add('show');
    scrollToTopBtn.classList.add('show');
  } else {
    body.style.margin = '0';
    wrapper.style.display = 'block';
    header.style.position = 'static';
    headerTop.classList.remove('hide');
    headerLogo.classList.remove('hide');
    u_a_i_first.classList.remove('hide');
    uaList.style.padding = '10px';
    sellLinks.forEach((sellLink) => {
      sellLink.classList.remove('hide');
    });
    selections.forEach((selection) => {
      selection.classList.remove('hide');
    });
    newsInfo.forEach((item) => {
      item.classList.remove('hide');
    });
    buildPCs.forEach((buildPC) => {
      buildPC.classList.remove('hide');
    });
    selectionScroll.classList.remove('show');
    scrollToTopBtn.classList.remove('show');
  }
};

const mess = document.querySelector.bind(document)('#mess');
const chatContent = document.querySelector.bind(document)('.chat__content');
let isReply = false;
mess.addEventListener('keydown', (e) => {
  if (e.key === 'Enter') {
    const val = mess.value;
    if (!val.trim()) return;
    const now = new Date();
    const time = Intl.DateTimeFormat('vi-VN', {
      hour: 'numeric',
      minute: 'numeric',
    }).format(now);
    // console.log(time);
    const html = `
                    <div class="mess__content">
                        <span>Hôm nay document.querySelector.bind(document){time}</span>
                        <p>
                            document.querySelector.bind(document){val}
                        </p>
                    </div>
                    `;
    // console.log(chatContent.length);
    chatContent.insertAdjacentHTML('afterbegin', html);
    if (!isReply) {
      setTimeout(function () {
        chatContent.insertAdjacentHTML(
          'afterbegin',
          `<p class = "reply">Cảm ơn anh, chị đã liên hệ tới MANGOES. Thời gian hỗ trợ, tư vấn, trả lời từ 8h30-24h hàng ngày. Hãy gửi cho chúng tôi mọi câu hỏi của quý anh,chị. Trân trọng!</p>`
        );
        isReply = true;
      }, 1000);
    }
    mess.value = null;
    mess.focus();
  }
});

const chat = document.querySelector.bind(document)('.chat');
const btnChat = document.querySelector.bind(document)('.exec__btn--chat');

btnChat.addEventListener('click', (e) => {
  // console.log(e.target.classList);
  if (
    e.target.classList.contains('exec__btn--chat') ||
    e.target.classList.contains('fa-facebook-messenger')
  ) {
    chat.classList.toggle('chat--show');
    mess.focus();
  }
});
