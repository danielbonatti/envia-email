## Gmail 
Ativar Gmail para acessar a partir de outros programas (https://mail.google.com). 

 - Gerenciar sua Conta do Google;
 - Opção "Segurança";
 - Selecione uma das opções do quadro "Como você faz login no Google";
 - E depois "Senhas de app";
 - Cadastre o app para gerar a senha:
	Preencha: "E-mail" em "Selecionar app" e "Outros" em "Selecionar dispositivo";
	Digite uma identificação para essa senha, exemplo: "SIGS".

Por fim o Google irá fornecer uma senha de autenticação para usar no envio dos e-mails fora de suas aplicações tradicionais.

<hr>

## Outlook
Desbloquer o envio fora do aplicativo oficial (https://outlook.live.com).

 - Configurações;
 - Exibir todas as configurações do Outlook;
 - Premium -> Segurança 
 - Segurança da conta: Veja suas atividades recentes para garantir que você é a única pessoa que está entrando na sua conta ;
 - Clique em ["Exibir"];
 - Identifique a atividade (a tentativa de envio) e confirme em ["Fui eu"].

A partir desse ponto o Outlook não deverá mais bloquear o envio dos e-mails pelo SIGS.

<hr>

### Outlook
 - Host: smtp.office365.com
 - Secure: TLS
 - Port: 587

### Gmail
 - Host: smtp.gmail.com
 - Secure: SMTPS
 - Port: 465

### Locaweb (default)
 - Host: email-ssl.com.br
 - Secure: SMTPS
 - Port: 465

### Locaweb (grandes volumes de e-mail)
 - Host: smtplw.com.br
 - Secure: TLS
 - Port: 587

 <hr>

 ## Observação
Após a instalação deste serviço é necessário conceder autorização de escrita para outros no diretório attachments(anexos):
```
chmod -R 772 /var/www/html/envia-email/attachments
```
