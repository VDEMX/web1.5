VERSION 5.00
Begin VB.Form Form1 
   BackColor       =   &H80000016&
   Caption         =   "Form1"
   ClientHeight    =   5220
   ClientLeft      =   60
   ClientTop       =   450
   ClientWidth     =   9270
   LinkTopic       =   "Form1"
   ScaleHeight     =   5220
   ScaleWidth      =   9270
   StartUpPosition =   3  'Windows Default
   Begin VB.CommandButton cmdsalir 
      Caption         =   "Salir"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   5160
      TabIndex        =   9
      Top             =   3960
      Width           =   1455
   End
   Begin VB.CommandButton cmdguardar 
      Caption         =   "Guardar"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   615
      Left            =   2880
      TabIndex        =   8
      Top             =   3960
      Width           =   1455
   End
   Begin VB.TextBox txteur 
      Height          =   495
      Left            =   4320
      TabIndex        =   7
      Top             =   3120
      Width           =   1455
   End
   Begin VB.TextBox txtusd 
      Height          =   495
      Left            =   4320
      TabIndex        =   5
      Top             =   2280
      Width           =   1455
   End
   Begin VB.TextBox txthora 
      Height          =   495
      Left            =   6720
      TabIndex        =   3
      Top             =   2760
      Width           =   1455
   End
   Begin VB.TextBox txtfecha 
      Height          =   495
      Left            =   240
      TabIndex        =   1
      Top             =   2760
      Width           =   2895
   End
   Begin VB.TextBox txtfechareg 
      BackColor       =   &H8000000E&
      Height          =   285
      Left            =   120
      TabIndex        =   10
      Top             =   4800
      Visible         =   0   'False
      Width           =   2295
   End
   Begin VB.TextBox txthorareg 
      Height          =   285
      Left            =   7200
      TabIndex        =   11
      Top             =   4800
      Visible         =   0   'False
      Width           =   1815
   End
   Begin VB.Image Image1 
      Height          =   1965
      Left            =   120
      Picture         =   "tc.frx":0000
      Top             =   120
      Width           =   9000
   End
   Begin VB.Label lbleur 
      Caption         =   "EUR"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   375
      Left            =   3600
      TabIndex        =   6
      Top             =   3240
      Width           =   735
   End
   Begin VB.Label Label1 
      Caption         =   "USD"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   375
      Left            =   3600
      TabIndex        =   4
      Top             =   2400
      Width           =   735
   End
   Begin VB.Label lblhora 
      Caption         =   "Hora"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   375
      Left            =   6000
      TabIndex        =   2
      Top             =   2880
      Width           =   615
   End
   Begin VB.Label lblfecha 
      Caption         =   "Fecha"
      BeginProperty Font 
         Name            =   "MS Sans Serif"
         Size            =   12
         Charset         =   0
         Weight          =   700
         Underline       =   0   'False
         Italic          =   0   'False
         Strikethrough   =   0   'False
      EndProperty
      Height          =   255
      Left            =   1320
      TabIndex        =   0
      Top             =   2400
      Width           =   855
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
Option Explicit
Dim mivariable, mivariable2 As String
Dim strtblvalores As String
Dim dbtc As Database
Dim x As Integer

Dim rstvalores As Recordset


Private Sub Option1_Click()

End Sub

Private Sub cmdguardar_Click()


rstvalores.AddNew
rstvalores.Fields("fecha") = txtfecha.Text
rstvalores.Fields("TCUSD") = txtusd.Text
rstvalores.Fields("TCEUR") = txteur.Text
rstvalores.Fields("hora") = txthora.Text


txtfechareg.Text = Format(Date, "dddd d MMMM yyyy")
txthorareg.Text = Format(Time, "hh:mm")
rstvalores.Fields("Fecha Registro") = txtfechareg.Text
rstvalores.Fields("Hora Registro") = txthorareg.Text

rstvalores.Update


Open "C:\TC\tcvariables.html" For Input As #1
Open "C:\TC\tc.html" For Output As #2

While Not EOF(1)
       Line Input #1, mivariable
        
        mivariable2 = Replace(mivariable, "v_tcusd", txtusd.Text, , , vbTextCompare)
        If mivariable = mivariable2 Then
        mivariable2 = Replace(mivariable, "v_tceur", txteur.Text, , , vbTextCompare)
        End If
         If mivariable = mivariable2 Then
        mivariable2 = Replace(mivariable, "v_tchora", txthora.Text, , , vbTextCompare)
        End If
         If mivariable = mivariable2 Then
        mivariable2 = Replace(mivariable, "v_tcfecha", txtfecha.Text, , , vbTextCompare)
        End If
            
        
        Print #2, mivariable2

Wend
Close #1, #2


x = Shell("C:\TC\TCVDE.bat")


MsgBox ("Datos Agregados correctamente")

End Sub

Private Sub cmdsalir_Click()
End

End Sub

Private Sub Form_Load()

Set dbtc = DBEngine.OpenDatabase("C:\TC\tc.mdb")

Set rstvalores = dbtc.OpenRecordset("valores")

txtfecha.Text = Format(Date, "dddd d MMMM yyyy")
txthora.Text = Format(Time, "hh:mm")


End Sub


