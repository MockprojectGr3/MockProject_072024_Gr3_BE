package com.mock.bodyguards.repository;

import com.mock.bodyguards.entity.BodyguardTraining;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface BodyguardTrainingRepository extends JpaRepository<BodyguardTraining, Long> {

    List<BodyguardTraining> findByBodyguardId(Long bodyguardId);
}
