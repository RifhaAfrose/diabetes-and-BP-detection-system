data segment
a db 05h
b db 02h
c db ?
data ends
code segment
assume cs:code,ds:data
start:
  mov ax,data
  mov ds,ax
  mov al,a
  mov bl,b
  add al,bl
  mov c,al
  mov ah,4ch
  int 21h
  code ends
  end start

