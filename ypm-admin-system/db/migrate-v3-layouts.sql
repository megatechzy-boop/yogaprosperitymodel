-- ============================================================
-- Migration: adds design-LAYOUT support (6 different page
-- structures) to an EXISTING install that already has the
-- theme column from migrate-v2-themes.sql.
-- If this is a fresh install, just use db/schema.sql instead.
-- ============================================================

ALTER TABLE landing_pages
  ADD COLUMN IF NOT EXISTS layout VARCHAR(50) NOT NULL DEFAULT 'classic' AFTER theme,
  ADD COLUMN IF NOT EXISTS video_url VARCHAR(500) AFTER layout,
  ADD COLUMN IF NOT EXISTS testimonial_text TEXT AFTER highlights,
  ADD COLUMN IF NOT EXISTS testimonial_author VARCHAR(150) AFTER testimonial_text,
  ADD COLUMN IF NOT EXISTS urgency_note VARCHAR(255) AFTER webinar_date;
