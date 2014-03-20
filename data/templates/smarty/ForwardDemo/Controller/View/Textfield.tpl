<form>
    Enter Text:
    <input type="hidden" name="SimpleFormDemo[screen]" value="Textfield" />
    <textarea type="text" name="SimpleFormDemo[text]" ></textarea>
    <input type="submit" name="SimpleFormDemo[submit]" value="Send" />
    <br />
    Last time you entered: {$strInput|htmlspecialchars}
</form>
