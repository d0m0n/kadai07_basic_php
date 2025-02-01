// 日付入力フォームの初期設定を今日にする
window.onload = function () {
  let getToday = new Date();
  let y = getToday.getFullYear();
  let m = getToday.getMonth() + 1;
  let d = getToday.getDate();
  let today =
    y +
    "-" +
    m.toString().padStart(2, "0") +
    "-" +
    d.toString().padStart(2, "0");
  document.getElementById("datepicker").setAttribute("value", today);
};
