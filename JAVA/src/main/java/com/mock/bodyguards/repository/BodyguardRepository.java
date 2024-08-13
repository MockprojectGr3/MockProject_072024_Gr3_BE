package com.mock.bodyguards.repository;

import com.mock.bodyguards.entity.Bodyguard;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

@Repository
public interface BodyguardRepository extends JpaRepository<Bodyguard, Long> {
}
