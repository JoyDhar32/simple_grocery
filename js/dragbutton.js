const dragBtn = document.getElementById('dragBtn');
let offsetX = 0;
let offsetY = 0;
let isDragging = false;

dragBtn.addEventListener('mousedown', function(e) {
  // Calculate the offset between the mouse pointer and the button
  offsetX = e.clientX - dragBtn.offsetLeft;
  offsetY = e.clientY - dragBtn.offsetTop;
  isDragging = true;
});

document.addEventListener('mousemove', function(e) {
  if (isDragging) {
    // Set the new position of the button
    dragBtn.style.left = e.clientX - offsetX + 'px';
    dragBtn.style.top = e.clientY - offsetY + 'px';
  }
});

document.addEventListener('mouseup', function(e) {
  isDragging = false;
});
