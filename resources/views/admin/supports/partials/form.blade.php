@csrf
<input type="text" placeholder="Assunto" name="subject" value={{$support->subject ?? old('subject')}} >
<input type="textarea" placeholder="Descrição" cols="30" rows="10" name="body" value={{$support->body ?? old('body')}} >
<input type="submit" value="Enviar"></input>