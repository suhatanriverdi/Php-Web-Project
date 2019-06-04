-- SELECT createdAt FROM proposal WHERE createdAt - CURDATE() < 15;
-- SELECT CURDATE(); -- Yıl Ay Gün getirir
-- SELECT curtime(); -- Saat Dakika Saniye Getir

CREATE EVENT proposal_Remover_id15Days
ON SCHEDULE EVERY 1 DAY
ON COMPLETION PRESERVE -- Çalıştıktan sonra drop olmasın
DO
   UPDATE proposal SET isActive = 0 WHERE create_time >= now() + INTERVAL 15 DAY;
   
-- DROP EVENT proposal_Remover_id15Days; 
SHOW EVENTS 