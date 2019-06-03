# ! /bin/sh


sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' descritiva_pt.xhtml
pause
sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./descritiva_en.xhtml

sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./estrategia_pt.xhtml
sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./estrategia_en.xhtml

sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./voluntariado_pt.xhtml
sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./voluntariado_en.xhtml

sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./donate_pt.xhtml
sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./donate_en.xhtml

sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./develop_pt.xhtml
sed -i 's/<?xml version="1.0" encoding="UTF-8"?>/ /g' ./develop_en.xhtml


sed -i 's/<a href="http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ" class="Internet_20_link">http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ<\/a>/ <iframe title="YouTube video player" class="youtube-player" type="text\/html" width="640" height="390" src="http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ" frameborder="0" allowFullScreen><\/iframe>  /g' ./develop_pt.xhtml
sed -i 's/<a href="http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ" class="Internet_20_link">http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ<\/a>/ <iframe title="YouTube video player" class="youtube-player" type="text\/html" width="640" height="390" src="http:\/\/www.youtube.com\/embed\/QZ-5ADFl6WQ" frameborder="0" allowFullScreen><\/iframe>  /g' ./develop_en.xhtml



sed -i 's/&lt;paypal&gt;/<form action="https:\/\/www.paypal.com\/cgi-bin\/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="PT"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https:\/\/www.paypalobjects.com\/pt_PT\/PT\/i\/btn\/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - A forma mais fácil e segura de efetuar pagamentos online!"><img alt="" border="0" src="https:\/\/www.paypalobjects.com\/pt_PT\/i\/scr\/pixel.gif" width="1" height="1"><\/form>/g' ./donate_pt.xhtml

sed -i 's/&lt;paypal&gt;/<form action="https:\/\/www.paypal.com\/cgi-bin\/webscr" method="post" target="_top"><input type="hidden" name="cmd" value="_donations"><input type="hidden" name="business" value="danielchanfana@gmail.com"><input type="hidden" name="lc" value="US"><input type="hidden" name="item_name" value="Foundation Mission Save"><input type="hidden" name="no_note" value="0"><input type="hidden" name="currency_code" value="EUR"><input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest"><input type="image" src="https:\/\/www.paypalobjects.com\/en_US\/i\/btn\/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><img alt="" border="0" src="https:\/\/www.paypalobjects.com\/en_US\/i\/scr\/pixel.gif" width="1" height="1"><\/form>/g' ./donate_en.xhtml

pause